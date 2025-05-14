<?php
require(dirname(__FILE__) . "/auth_process.php");
require_once(dirname(__FILE__) . "/repos/mysql.php");

session_start();
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

$data = getData();

$username = cleanInput($data['username']) ?? null;
$password = cleanInput($data['password']) ?? null;
$csrf_token = $data['csrf_token'] ?? null;

const WRONG_DATA_ERROR = ["code" => 401, "error_code" => 1061, "message" => "Неправильный никнейм или пароль"];

function sqlLoginProcess(array $params = []): bool
{
	try {
		$repos = new Repository();
		$res = $repos->executeQuery("SELECT password_hash FROM `users` WHERE username=?", [$params['username']]);
		if (password_verify($params['password'], $res['password_hash']) !== true) {
			echo json_encode(WRONG_DATA_ERROR);
			exit;
		}
		return true;
	} catch (Exception $e) {
		error_log('login error: ' . $e->getMessage());
	}
	return false;
}

// Проверка CSRF токена
$csrfAlive = CSRFTokenCheck($csrf_token);
if ($csrfAlive['success']) {
	$params = ["username" => $username, "password" => $password];
	if (validateData($params)) {
		if (sqlLoginProcess($params)) {
			$_SESSION['isLoggedIn'] = true;
			$_SESSION['username'] = $params['username'];
			echo json_encode(["code" => 200]);
		} else {
			echo json_encode(WRONG_DATA_ERROR);
		}
	} else {
		echo json_encode(["code" => 401, "error" => "incorrect data in auth form"]);
	}
} else {
	echo json_encode(['code' => 403, 'error' => $csrfAlive['error']]);
}
