<?php
session_start();

$productId = (int) file_get_contents('php://input') ?? null;

if ($productId !== null && isset($_SESSION['goods'][$productId])) {
	if ($_SESSION['goods'][$productId]['like'] === false) {
		$_SESSION['goods'][$productId]['like'] = true;
	} else {
		$_SESSION['goods'][$productId]['like'] = false;
	}
	echo json_encode($_SESSION['goods'][$productId]);
} else {
	echo json_encode(["status" => false]);
}
