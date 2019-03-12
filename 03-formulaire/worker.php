<?php

$name = null;
$message = null;

if ($_SERVER['REQUEST_METHOD'] === "POST") {

     // Récupération des données
    $name     = isset($_POST['name']) ? trim($_POST['name']) : null;
    $message  = isset($_POST['mess']) ? trim($_POST['mess']) : null;
    

    if (strlen($name) <2 ){
        echo "Le nom doit comporter au moins 2 caracteres";
    }else if (strlen($message) <2){
        echo "le message doit comporter au moins 2 caracteres";

    }else {

        echo 'Succès';
    }

}