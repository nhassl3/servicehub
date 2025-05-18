<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            $inputData = $request->all();

            $rules = [
                'username' => 'required|string|max:100',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed'
            ];

            $messages = [
                'username.required' => 'Пожалуйста, укажите имя пользователя',
                'email.email' => 'Вы ввели не email',
                'email.required' => 'Пожалуйста, укажите email',
                'password.min' => 'Пароль должен быть не менее 8 символов',
                'password.confirmed' => "Пароли не совпадают"
            ];

            $validator = Validator::make($inputData, $rules, $messages);

            if ($validator->fails()) {
                Log::info($validator->messages());
                return back()->withErrors($validator);
            }

            $validatedData = $validator->getData();

            $user = User::create([
                'username' => $validatedData['username'],
                'email' => $validatedData['email'],
                'password_hash' => Hash::make($validatedData['password'])
            ]);

            $token = $user->createToken('auth_token_' . $user['username'])->plainTextToken;

            return redirect('/', 201)->withHeaders("Access-Token: $token");
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['success' => false, 'message' => $e->getMessage()], 401);
        }
    }

    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'username' => 'required|string|max:100',
                'password' => 'required|string||min:8'
            ]);

            if (Auth::attempt($credentials)) {
                $user = User::where('username', $credentials['username'])->first();
                $token = $user->createToken('auth_token_' . $credentials['username'])->plainTextToken;
                return response()->json(['success' => true, 'message' => 'successful login', 'token' => $token,], 200);
            } else {
                throw new Exception('not found user or incorrect password');
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['success' => false, 'message' => $e->getMessage()], 401);
        }
    }
}
