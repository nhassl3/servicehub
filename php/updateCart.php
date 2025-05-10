<?php
session_start();

if ($_SESSION["isLoggedIn"] && isset($_SESSION['goods'])) {
	echo json_encode(array("code" => 200, "count" => count($_SESSION['goods'])));
} else {
	echo json_encode(array('code' => 400, "error" => "user is not logged or goods is not available"));
}
