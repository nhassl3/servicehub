<?php
// Защита от XSS
function cleanInput($data): string
{
	$data = trim($data); // удаляет пробельные или другие символы в начале и конце строки
	$data = stripslashes($data); // удаляет символы экранирования
	$data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8'); // преобразовывает (с кавычками) специальные символы в HTML-сущности 
	return $data;
}

// Загрузка данных извне
function getData(): mixed
{
	$data = file_get_contents('php://input') ?? null;

	if (!empty($data)) {
		$data = json_decode($data, true);
		return $data;
	} else {
		echo json_encode(['code' => '401', 'error' => 'empty data']);
		exit(1);
	}
}

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
function validateData(array $data = []): bool
{
	if (empty($data)) {
		return false;
	}

	foreach ($data as $key => $value) {
		if (empty($value)) {
			return false;
		}

		if ($key === 'password') {
			if (str_contains($value, ' ') || filter_var($value, FILTER_DEFAULT) === false) {
				return false;
			}
		} elseif ($key === 'email') {
			if (filter_var($value, FILTER_VALIDATE_EMAIL) === false) {
				return false;
			}
		}
	}
	return true;
}
