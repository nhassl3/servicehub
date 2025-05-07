<?php
session_start();
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

$data = file_get_contents('php://input') ?? null;

if (!empty($data)) {
	$data = json_decode($data, true);
} else {
	echo json_encode(['code' => '401', 'error' => 'empty data']);
}

// Защита от XSS
function cleanInput($data)
{
	$data = trim($data); // удаляет пробельные или другие символы в начале и конце строки
	$data = stripslashes($data); // удаляет символы экранирования
	$data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8'); // преобразовывает (с кавычками) специальные символы в HTML-сущности 
	return $data;
}

$username = cleanInput($data['username']) ?? null;
$password = cleanInput($data['password']) ?? null;
$telephoneNumber = cleanInput($data['telephone']) ?? null;
$csrf_token = $data['csrf_token'] ?? null;

// Защита от перехода
function CSRFTokenCheck(string $csrf_token): array
{
	// Проверяем наличие токена
	if ($csrf_token !== null || isset($_SESSION['csrf_token'])) {
		// Проверяем эквивалентность токенов
		if (hash_equals($_SESSION['csrf_token'], user_string: $csrf_token)) {
			return ['success' => true, 'error' => ''];
		}
		return ['success' => false, 'error' => 'Неверный CSRF токен'];
	}
	return ['success' => false, 'error' => 'CSRF токен отсутствует'];
}

// Валидация данных
function validateData(string $username, string $password): bool
{
	if (empty($username) || empty($password)) {
		return false;
	}
	return true;
}

// SQL запрос
function sql_query(string $sql, array $params = []): bool
{
	return true;
}

// Проверка CSRF токена
$csrfAlive = CSRFTokenCheck($csrf_token);
if ($csrfAlive['success']) {
	if (validateData($username, $password)) {
		if (sql_query("INSERT INTO [users] VALUES (?, ?, ?)", [$username, $password, (string) $telephoneNumber])) {
			$_SESSION['isLoggedIn'] = true;
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
