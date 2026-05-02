<?php
require_once __DIR__ . '/../DAO/DBConnection.php';
require_once __DIR__ . '/../DAO/getItems.php';
function getAllDesktops($filters = array()){
     $conn= DBConnection();
     $desktops=getAll($conn, "desktop", $filters);
     return $desktops;
}
