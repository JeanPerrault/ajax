<?php

$name = null;
$message = null;

if ($_SERVER['REQUEST_METHOD'] === "POST") {

     // Récupération des données
    $name     = isset($_POST['name']) ? trim($_POST['name']) : null;
    $message  = isset($_POST['mess']) ? trim($_POST['mess']) : null;
    

    if (strlen($name) <2 && strlen($message) <2){
        echo "Le nom et le message doivent comporter au moins 2 caracteres";
    }else {
        echo 'Succès';
    }

}