<?php
require_once __DIR__ . '/../DAO/DBConnection.php';
require_once __DIR__ . '/../DAO/getItems.php';
function getAllComponents($filters = array()){
     $conn= DBConnection();
     $components=getAll($conn, "component", $filters);
     return $components;
}
