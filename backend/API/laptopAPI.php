<?php
require_once __DIR__ . "/../DAO/DBConnection.php";
require_once __DIR__ . "/../DAO/getItems.php";
function getAllLaptops($filters = array()){
     $conn= DBConnection();
     $laptops=getAll($conn, "laptop", $filters);
     return $laptops;
}


