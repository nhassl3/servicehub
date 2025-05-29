<?php
session_start();

$productId = (int) file_get_contents('php://input') ?? null;

if ($productId !== null && isset($_SESSION['goods'][$productId])) {
	unset($_SESSION["goods"][$productId]);
	echo json_encode(['success' => true]);
} else {
	if (count($_SESSION['goods']) < $productId) {
		session_destroy();
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			header("Location: /pages/shopping-cart.php");
			exit;
		}
	}
	echo json_encode(['success' => false]);
}
 ?><?php /**PATH /home/nhassl3/projects/servicehub/resources/views/delete_product.blade.php ENDPATH**/ ?>