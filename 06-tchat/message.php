<?php

include_once "connectdb.php";

header('Content-Type: application/json');

    $pseudo = null;
    $message = null;
    $date = date("Y-m-d H:i:s");

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
            // Récupération des données
        $pseudo   = isset($_POST['pseudo']) ? trim($_POST['pseudo']) : null;
        $message  = isset($_POST['message']) ? trim($_POST['message']) : null;
        
    
        $query = $db->prepare("INSERT INTO message (`pseudo`, `date`, `message`) 
                                            VALUES (:pseudo, :date, :message)");
        $query->bindValue(':pseudo', $pseudo);
        $query->bindValue(':message', $message);
        $query->bindValue(':date', $date);
        $query->execute();

        echo json_encode([
            'pseudo' => $pseudo,
            'message' => $message,
            'date' => $date
        ]);

    }
    