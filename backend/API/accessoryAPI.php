<?php
require_once __DIR__ . '/../DAO/DBConnection.php';
require_once __DIR__ . '/../DAO/getItems.php';
function getAllAccessories(){
     $conn= DBConnection();
     $accessories=getAll($conn, "accessory");
     return $accessories;
}
