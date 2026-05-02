<?php
require_once __DIR__ . "/../DAO/DBConnection.php";
require_once __DIR__ . "/../DAO/getItems.php";
function getAllLaptops(){
     $conn= DBConnection();
     $laptops=getAll($conn, "laptop");
     return $laptops;
}


