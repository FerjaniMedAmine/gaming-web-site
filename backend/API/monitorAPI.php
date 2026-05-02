<?php
require_once __dir__ . "/../DAO/DBConnection.php";
require_once __dir__ . "/../DAO/getItems.php";

function getAllMonitors($filters = array()){
    $conn=DBConnection();
    $monitors=getAll($conn, "monitor", $filters);
    return $monitors;
}