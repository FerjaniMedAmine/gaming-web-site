<?php
require_once __DIR__ . '/../DAO/DBConnection.php';
require_once __DIR__ . '/../DAO/getItems.php';
function getAllAccessories($filters = array()){
     $conn= DBConnection();
     $accessories=getAll($conn, "accessory", $filters);
     return $accessories;
}
