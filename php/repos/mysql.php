<?php
require_once __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;
use LDAP\Result;

session_start();

// Загружаем переменные из .env
$dotenv = Dotenv::createImmutable($_SERVER['DOCUMENT_ROOT']);
$dotenv->load();

// Параметры подключения из .env
function loadPassword(string $password, string $passphrase): string
{
	try {
		return openssl_decrypt(
			$password,
			$_ENV['DB_ALBRA'],
			$passphrase, // base64_decode($_SESSION['pph_unable_to_assigned']),
			0,
			$_ENV['DB_IVVV']
		);
	} catch (Exception $e) {
		throw new Exception('error when loading password. check params');
	}
}

class Repository
{
	private mysqli|null $connection;
	private string $host;
	private string $user;
	private string $password;
	private string $database;

	public function __construct()
	{
		$this->host = $_ENV['DB_HOST'];
		$this->user = $_ENV['DB_USER'];
		$this->password = loadPassword($_ENV['DB_PASS'], base64_decode($_ENV['DB_PAS'], true));
		$this->database = $_ENV['DB_NAME'];

		$this->connect();
	}

	private function connect(): void
	{
		try {
			$this->connection = new mysqli(
				$this->host,
				$this->user,
				$this->password,
				$this->database
			);

			if ($this->connection->connect_errno) {
				throw new RuntimeException(
					"Connection error: " . $this->connection->connect_error
				);
			}

			$this->connection->set_charset("utf8mb4");
		} catch (Exception $e) {
			throw $e; // Пробрасываем исключение дальше
		}
	}

	private function getConnection(): mysqli
	{
		// Проверяем, активно ли соединение
		try {
			if (!$this->connection || !$this->connection->ping()) {
				$this->connect(); // Переподключаемся если соединение утеряно
			}
		} catch (Exception $e) {
			throw new Exception("error when reconnecting: " . $e->getMessage());
		}
		return $this->connection;
	}

	public function executeQuery(string $query, array $params = []): array|bool|null
	{
		$this->connection = $this->getConnection();

		if (empty($query)) {
			throw new Exception("empty query string");
		}
		$query = strtolower($query);

		if (str_starts_with($query, "insert") && empty($params)) {
			throw new Exception("empty params for inserting query");
		}

		try {
			$stmt = $this->connection->prepare($query);

			if ($params && array_keys($params) !== range(0, count($params) - 1)) {
				$params = array_values($params);
			}

			if (!$stmt->execute($params)) {
				throw new Exception('execute error: no valid params or sql error');
			}

			if (str_starts_with($query, 'select')) {
				$result = $stmt->get_result()->fetch_assoc();
				$stmt->close();
				return $result;
			}

			$stmt->close();
		} catch (Exception $e) {
			if ($e->getCode() === 1062) {
				throw new Exception('duplicate values', $e->getCode());
			}
			throw new Exception('statement error: ' . $e->getMessage() . ' QueryString: ' . $query . ' code: ' . $e->getCode());
		}

		return true;
	}

	public function close(): void
	{
		try {
			if ($this->connection && $this->connection->ping()) {
				$this->connection->close();
			}
			$this->connection = null;
		} catch (Exception $e) {
			$this->connection = null;
		}
	}

	public function __destruct()
	{
		$this->close();
	}
}
