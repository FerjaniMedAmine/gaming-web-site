<?php
require_once "../DAO/DBConnection.php";
require_once "../DAO/getItems.php";
$pdo= DBConnection();
$desktops=getDesktops($pdo);
header('Content-Type: application/json');

echo json_encode($desktops);