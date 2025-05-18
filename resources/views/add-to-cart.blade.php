<?php
session_start();

$price = random_int(999, 3999);
$discount_price = random_int(498, $price - 500);

if (isset($_SESSION["goods"])) {
	$idProduct = count($_SESSION['goods']) + 1;
	$data = [
		"id" => $idProduct,
		"name" => "Good_" . $idProduct,
		"description" => "($idProduct) Lorem ipsum dolor сидеть amet consectetur adipiscing elit. Жизнь заставляет некоторых бежать и бросать, ошибка лести в выборе этих самых никто, что изобретатель не случится различие удобства и тех грубее ничего особенно с которым, боль что. Разве удовольствие, которое легко и нежно, следует отвергать, даже если оно самое незначительное, но не легкое? Никогда, где что-либо, распущенный ум, заблуждение и легкий полет хвалящих, испорченных самим временем?",
		'image' => 'https://cdn.prod.website-files.com/67d171cf69fdf4b81a514090/67d171cf69fdf4b81a5140cc_store-item-1.jpg',
		'price' => $price,
		'discount_price' => $price - $discount_price,
		'weight' => $idProduct >= 1000 ? 999 : $idProduct,
		'unity_weight' => "MB",
		'like' => false,
	];

	if (array_push($_SESSION['goods'], $data)) {
		echo json_encode(["status" => true]);
	} else {
		echo json_encode(['success' => false]);
	}
} else {
	echo json_encode(['success' => false]);
}
