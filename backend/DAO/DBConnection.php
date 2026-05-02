<?php
function DBConnection(){
    $host ="localhost";
    $user ="root";
    $password ="";
    $dataBaseName="LevelUpZone";
    $conn =mysqli_connect($host,$user,$password,$dataBaseName);  
    return $conn ; 
}




