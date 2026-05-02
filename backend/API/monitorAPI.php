<?php
require_once __dir__ . "/../DAO/DBConnection.php";
require_once __dir__ . "/../DAO/getItems.php";

function getAllMonitors(){
    $conn=DBConnection();
    $monitors=getAll($conn, "monitor");
    return $monitors;
}