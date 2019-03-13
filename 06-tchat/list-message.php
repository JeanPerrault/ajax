<?php

include_once "connectdb.php";

header('Content-Type: application/json');

   

    // Récupération de tous les messages
    $messages = $db->query("SELECT * FROM message")-> fetchAll();

    // on renvoie les messages en Json
    echo json_encode($messages);

    