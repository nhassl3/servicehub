<?php
session_start();

try {
	$_SESSION['isLoggedIn'] = false;
	// unset($_SESSION['goods'], $_SESSION['isLoggedIn']);
	// session_destroy();
	echo json_encode(['success' => true]);
} catch (Exception $e) {
	echo json_encode(['success' => false, 'error' => '[' . $e->getCode() . '] ' . $e->getMessage() . '']);
}
