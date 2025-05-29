<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class AuthController
{
    private function loadSessionVariables(Request $request)
    {
        $user = User::whereEmail($request->user()->email)->firstOrFail();
        $request->session()->put("isLoggedIn", !empty($user) ? true : false);
        // $request->session()->put('countCartItems', $user->cart()->items()->count());
    }

    public function register(Request $request)
    {
        try {
            $rules = [
                'username' => 'required|string|max:100',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed'
            ];

            $messages = [
                'username.required' => 'Пожалуйста, укажите имя пользователя',
                'email.email' => 'Вы ввели некорректный email',
                'email.required' => 'Пожалуйста, укажите email',
                'email.unique' => 'Этот email уже зарегистрирован',
                'password.min' => 'Пароль должен быть не менее 8 символов',
                'password.confirmed' => 'Пароли не совпадают'
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            $token = $user->createToken('Servicehub')->plainTextToken;

            Auth::login($user);

            return redirect('/')->with('token', $token);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()
                ->back()
                ->withErrors('Произошла ошибка при регистрации')
                ->withInput();
        } finally {
            $this->loadSessionVariables($request);
        }
    }

    public function login(Request $request)
    {
        try {
            $rules = [
                'email' => 'required|string|email|max:255',
                'password' => 'required|string|min:8'
            ];

            $messages = [
                'email.email' => 'Вы ввели некорректный email',
                'email.required' => 'Пожалуйста, укажите email',
                'password.min' => 'Пароль должен быть не менее 8 символов',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            if (Auth::attempt($request->only('email', 'password'), true)) {
                $user = User::whereEmail($request->email)->firstOrFail();
                $token = $user->createToken('Servicehub', expiresAt: now()->addHours(24))->plainTextToken;
                return redirect('/')->with("data", ['success' => true, 'message' => 'Успешный вход', 'token' => $token]);
            } else {
                throw new Exception('Неправильный никнейм или пароль');
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return back()->withErrors(['success' => false, 'message' => $e->getMessage()])->withInput();
        } finally {
            $this->loadSessionVariables($request);
        }
    }

    public function logout(Request $request)
    {
        try {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            Cache::forget('countCartItems');
            return redirect('/');
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
