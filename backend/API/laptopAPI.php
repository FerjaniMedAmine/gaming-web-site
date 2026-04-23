<?php
require_once "../DAO/DBConnection.php";
require_once "../DAO/getItems.php";
$pdo= DBConnection();
$laptops=getLaptops($pdo);
header('content-Type: application/json');

echo json_encode($laptops);
