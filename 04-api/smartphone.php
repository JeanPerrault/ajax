<?php

// Configuration de l'application
include_once "connectdb.php";



// on recupere les smartphones en associatif
$sql = "SELECT * FROM phone";
$q = $db->query($sql);
$tel = $q->fetchALL(PDO::FETCH_ASSOC);   
// var_dump($tel);    



// transformer le tableau en JSON (json_encode)
header('Content-Type: application/json');
echo json_encode($tel);

