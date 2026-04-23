<?php

function DBConnection(){
    try{
        $host ="localhost";
        $user ="root";
        $password ="";
        $dataBaseName="chaieb_info";
        $db = new PDO ("mysql:host=$host;dbname=$dataBaseName",$user,$password);            
        return $db;
    }catch(PDOException $e){
        echo "something went wrong" . $e->getMessage();
        exit();
    }
}


