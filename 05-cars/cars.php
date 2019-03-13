<?php

// Configuration de l'application
include_once "connectdb.php";



header('Content-Type: application/json');

// Si on a un paramètre id dans l'URL cars.php?id=1
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $car = $db->query('SELECT * FROM tbl_cars WHERE id = '.$id)->fetch();
    echo json_encode($car);
} else {
    // Récupérer toutes les voitures en JSON
    $cars = $db->query('SELECT * FROM tbl_cars')->fetchAll();
    // Transformer le tableau en JSON (json_encode)
    echo json_encode($cars);
}
