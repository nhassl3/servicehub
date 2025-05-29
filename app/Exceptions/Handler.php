<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use \Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Session\TokenMismatchException;
use Throwable;

class Handler extends ExceptionHandler
{
	/**
	 * Список исключений, которые не должны логироваться
	 */
	// protected $dontReport = [
	// 	\Illuminate\Auth\AuthenticationException::class,
	// 	\Illuminate\Auth\Access\AuthorizationException::class,
	// 	\Illuminate\Validation\ValidationException::class,
	// ];
	public function register()
	{
		// Обработка 404 ошибки
		$this->renderable(function (ModelNotFoundException $e, $request) {
			return response()->view('errors.404', [], 404);
		});

		$this->renderable(function (TokenMismatchException $e, $request) {
			return response()->view('errors.419', [], 419);
		});

		// // Обработка кастомного исключения
		// $this->renderable(function (\App\Exceptions\CustomException $e, $request) {
		// 	return response()->json([
		// 		'message' => $e->getMessage(),
		// 		'code' => $e->getCode()
		// 	], 500);
		// });

		// Глобальная обработка всех исключений
		$this->renderable(function (Throwable $e, $request) {
			if ($request->expectsJson()) {
				return response()->json([
					'message' => $e->getMessage(),
					'errors' => method_exists($e, 'errors') ? $e : null
				], $this->getStatusCode($e));
			}
		});
	}

	protected function getStatusCode(Throwable $e)
	{
		return method_exists($e, 'getStatusCode')
			? $e->getCode()
			: 500;
	}
}
