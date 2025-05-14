<?php
require(dirname(__FILE__) . "/auth_process.php");
require_once(dirname(__FILE__) . "/repos/mysql.php");

session_start();
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

$data = getData();

$username = cleanInput($data['username']) ?? null;
$email = cleanInput($data['email']) ?? null;
$password = cleanInput($data['password']) ?? null;
$csrf_token = $data['csrf_token'] ?? null;

function hashPassword($password): string
{
	if (defined("PASSWORD_ARGON2ID")) {
		$hash = password_hash($password, PASSWORD_ARGON2ID, [
			'memory_cost' => 65536,
			'time_cost' => 4,
			'threads' => 1,
		]);
	} else {
		$hash = password_hash($password, PASSWORD_BCRYPT, [
			'cost' => 24,
		]);
	}
	return $hash;
}

// SQL запрос
function sqlRegisterProcess(array $params = []): bool
{
	try {
		$repos = new Repository();
		$params['password'] = hashPassword($params['password']);
		return $repos->executeQuery(
			"INSERT INTO `users` (username, email, password_hash) VALUES (?, ?, ?)",
			$params
		);
	} catch (Exception $e) {
		if ($e->getCode() === 1062) {
			error_log('register error: ' . $e->getMessage());
			echo json_encode(['code' => 401, 'error_code' => 1062, 'message' => 'Данная электронная почта уже зарегистрирована']);
			exit;
		}
		error_log('register error: ' . $e->getMessage());
	}
	return false;
}

// Проверка CSRF токена
$csrfAlive = CSRFTokenCheck($csrf_token);
if ($csrfAlive['success']) {
	$params = ["username" => $username, "email" => $email, "password" => $password];
	if (validateData($params)) {
		if (sqlRegisterProcess($params)) {
			$_SESSION['isLoggedIn'] = true;
			$_SESSION['username'] = $params['username'];
			echo json_encode(["code" => 200]);
		} else {
			echo json_encode(["code" => 401, "error" => "sql error"]);
		}
	} else {
		echo json_encode(["code" => 401, "error" => "incorrect data in auth form"]);
	}
} else {
	echo json_encode(['code' => 403, 'error' => $csrfAlive['error']]);
}
