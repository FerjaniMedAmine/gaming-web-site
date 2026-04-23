<?php
require_once "../DAO/DBConnection.php";
require_once "../DAO/getItems.php";

$pdo=DBConnection();
$monitors=getMonitors($pdo);

header("Content-Type: application/json");
echo json_encode($monitors);
