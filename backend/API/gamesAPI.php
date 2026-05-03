<?php
require_once __DIR__ . '/../DAO/DBConnection.php';
require_once __DIR__ . '/../DAO/getItems.php';
function getAllGames(){
    $conn=DBConnection();
    $games=getAll($conn, "game");
    return $games;
}