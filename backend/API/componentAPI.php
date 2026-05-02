<?php
require_once __DIR__ . '/../DAO/DBConnection.php';
require_once __DIR__ . '/../DAO/getItems.php';
function getAllComponents(){
     $conn= DBConnection();
     $components=getAll($conn, "component");
     return $components;
}
