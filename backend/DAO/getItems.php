<?php
function getDesktops(PDO $pdo){
    $sql="select * from desktop ";
    $stmt =$pdo->prepare($sql);
    $stmt->execute();
    $desktops=$stmt->fetchall();
    return $desktops ?? [];

}   
function getLaptops(PDO $pdo){
    $sql="select * from laptop ";
    $stmt =$pdo->prepare($sql);
    $stmt->execute();
    $laptops=$stmt->fetchall();
    return $laptops ?? [];

}


function getMonitors(PDO $pdo){
    $sql="select * from monitor ";
    $stmt =$pdo->prepare($sql);
    $stmt->execute();
    $monitors=$stmt->fetchall();
    return $monitors ?? [];

}
//components
function getComponents(PDO $pdo){
    $sql="select * from component ";
    $stmt =$pdo->prepare($sql);
    $stmt->execute();
    $components=$stmt->fetchall();
    return $components ?? [];

}
function getCpus(PDO $pdo){
    $sql="select * from component where categorie='cpu'";
    $stmt =$pdo->prepare($sql);
    $stmt->execute();
    $cpus=$stmt->fetchall();
    return $cpus ?? [];
}
function getGpus(PDO $pdo){
    $sql="select * from component where categorie='gpu'";
    $stmt =$pdo->prepare($sql);
    $stmt->execute();
    $gpus=$stmt->fetchall();
    return $gpus ?? [];
}
function getRams(PDO $pdo){
    $sql="select * from component where categorie='ram'";
    $stmt =$pdo->prepare($sql);
    $stmt->execute();
    $rams=$stmt->fetchall();
    return $rams ?? [];
}
function getStorages(PDO $pdo){
    $sql="select * from component where categorie='storage'";
    $stmt =$pdo->prepare($sql);
    $stmt->execute();
    $storages=$stmt->fetchall();
    return $storages ?? [];
}

function getPsu(PDO $pdo){
    $sql="select * from component where categorie='psu'";
    $stmt =$pdo->prepare($sql);
    $stmt->execute();
    $psus=$stmt->fetchall();
    return $psus ?? [];
}
function getCases(PDO $pdo){
    $sql="select * from component where categorie='case'";
    $stmt =$pdo->prepare($sql);
    $stmt->execute();
    $cases=$stmt->fetchall();
    return $cases ?? [];
}
function getMoboards(PDO $pdo){
    $sql="select * from component where categorie='mobo'";
    $stmt =$pdo->prepare($sql);
    $stmt->execute();
    $mobos=$stmt->fetchall();
    return $mobos ?? [];
}

function getCoolers(PDO $pdo){
    $sql="select * from component where categorie='cooler'";
    $stmt =$pdo->prepare($sql);
    $stmt->execute();
    $coolers=$stmt->fetchall();
    return $coolers ?? [];
}

//accessories
function getAccessories(PDO $pdo){
    $sql="select * from accessory ";
    $stmt =$pdo->prepare($sql);
    $stmt->execute();
    $accessories=$stmt->fetchall();
    return $accessories ?? [];
}   

function getMice(PDO $pdo){
    $sql="select * from accessory where categorie='mouse'";
    $stmt =$pdo->prepare($sql);
    $stmt->execute();
    $mice=$stmt->fetchall();
    return $mice ?? [];
}
function getKeyboards(PDO $pdo){
    $sql="select * from accessory where categorie='keyboard'";
    $stmt =$pdo->prepare($sql);
    $stmt->execute();
    $keyboards=$stmt->fetchall();
    return $keyboards ?? [];
}

function getHeadsets(PDO $pdo){
    $sql="select * from accessory where categorie='headset'";
    $stmt =$pdo->prepare($sql);
    $stmt->execute();
    $headsets=$stmt->fetchall();
    return $headsets ?? [];
}

