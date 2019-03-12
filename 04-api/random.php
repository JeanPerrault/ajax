<?php

// Configuration de l'application
include_once "connectdb.php";

/**
 * 
 * ajouter les telephones suivants dans la base
 * 
 * Apple iPhone XS 899
 * Apple iPhone XR 999
 * Apple iPhone X 1199
 * Apple iPhone 8 799
 * Samsung Galaxy S10 999
 * Samsung Galaxy S9 599
 * 
 * A chaque execution on pourra TRUNCATE la table pour eviter les doublons
 * 
 */

$tels=[
    /* 0 */[
        "brand" => "Apple",
        "model" => "iPhoneXS",
        "price" => 899,
        ], 
    /* 1 */[
        "brand" => "Apple",
        "model" => "iPhoneXR",
        "price" => 999,
        ], 
    /* 2 */[
        "brand" => "Apple",
        "model" => "iPhoneX",
        "price" => 1199,
        ], 
    /* 3 */[
        "brand" => "Apple",
        "model" => "iPhone8",
        "price" => 799,
        ], 
    /* 4 */[
        "brand" => "Samsung",
        "model" => "Galaxy S10",
        "price" => 999,
        ], 
    /* 5 */[
        "brand" => "Samsung",
        "model" => "Galaxy S8",
        "price" => 599,
        ], 
    ];

    // on reset la table
    $db->query('TRUNCATE TABLE phone');

    // on prepare la requete
    $query = $db->prepare("INSERT INTO phone (`brand`, `model`, `price`) 
                                             VALUES (:brand, :model, :price)");
    // on execute 6 requetes
    foreach ($tels as $tel) {
        $query->bindValue(':brand', $tel['brand'], PDO::PARAM_STR);
        $query->bindValue(':model', $tel['model'], PDO::PARAM_STR);
        $query->bindValue(':price', $tel['price'], PDO::PARAM_INT);
        $query->execute();
    }
   
