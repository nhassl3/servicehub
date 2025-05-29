<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;
use Exception;

class Wrapped
{
	public static function wrapped_callback(Request $request, callable $callback, string $messageInError = ''): Response|JsonResponse|View
	{
		$user = $request->user();
		if ($user) {
			try {
				return call_user_func(
					$callback,
					$user
				);
			} catch (Exception $e) {
				$error = $e->getMessage();
				Log::error($error);
				return response()->json(['status' => Response::HTTP_INTERNAL_SERVER_ERROR, 'error' => $error] + !empty($messageInError) ? ['message' => $messageInError] : []);
			}
		}
		return view('/auth/register');
	}
}
