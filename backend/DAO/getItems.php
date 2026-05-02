<?php
function getAll($conn ,$category){
    $result=mysqli_query($conn, "select * from $category");
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
function getCpus($conn){
    $result=mysqli_query($conn, "select * from component where categorie=cpu");
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
function getGpus($conn){
    $result=mysqli_query($conn, "select * from component where categorie=gpu");
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
function getRams($conn){
    $result=mysqli_query($conn, "select * from component where categorie=ram");
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
function getStorages($conn){
    $result=mysqli_query($conn, "select * from component where categorie=storage");
    return mysqli_fetch_all($result, MYSQLI_ASSOC);

}

function getPsu($conn){
    $result=mysqli_query($conn, "select * from component where categorie=psu");
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
function getCases($conn){
    $result=mysqli_query($conn, "select * from component where categorie='case'");
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
function getMoboards($conn){
    $result=mysqli_query($conn, "select * from component where categorie='mobo'");
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getCoolers($conn){
    $result=mysqli_query($conn, "select * from component where categorie='cooler'");
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
   
}

 

function getMice($conn){
    $result=mysqli_query($conn, "select * from accessory where categorie='mouse'");
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
function getKeyboards($conn){
    $result=mysqli_query($conn, "select * from accessory where categorie='keyboard'");
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
    
}

function getHeadsets($conn){
    $result=mysqli_query($conn, "select * from accessory where categorie='headset'");
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
    
}

