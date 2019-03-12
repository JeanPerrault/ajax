<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" 
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" 
        crossorigin="anonymous">

</head>
<body>
    <!--
        Formulaire avec AJAX:
        1. Ajouter Bootstrap sur la page.
        2. Ajouter un formulaire en POST avec deux champs (Nom et message).
        3. Le formulaire sera traité sur le fichier worker.php (action).
        4. On va vérifier que le nom et le message fasse au moins 2 caractères.
        5. Si le formulaire est valide, on affiche "Succès".
        6. S'il y a des erreurs, on les affiche.
    -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form class="crud-form"  method="post">

                    <div class="form-group">
                        <label for="brand">Brand</label>
                        <input class="form-control" type="text" name="brand" id="brand">
                    </div>

                    <div class="form-group">
                        <label for="model">Model</label>
                        <input class="form-control" type="text" name="model" id="model">
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input class="form-control" type="text" name="price" id="price">
                    </div>

                    <div class="form-group">
                        <label for="picture">Picture</label>
                        <input class="form-control" type="text" name="picture" id="picture">
                    </div>

                    <button type="submit" class="btn btn-success btn-block">Valider</button>

                    <h1></h1>
                </form>
            </div>
        </div>
    </div>

<?php
// Configuration de l'application
include_once "connectdb.php";
$brand = null;
$model = null;
$price = null;
$picture = null;

if ($_SERVER['REQUEST_METHOD'] === "POST") {
     // Récupération des données
    $brand     = isset($_POST['brand']) ? trim($_POST['brand']) : null;
    $model  = isset($_POST['model']) ? trim($_POST['model']) : null;
    $price  = isset($_POST['price']) ? trim($_POST['price']) : null;
    $picture  = isset($_POST['picture']) ? trim($_POST['picture']) : null;

    if (strlen($brand) <2 ){
        echo "Le marque doit comporter au moins 2 caracteres";
    }else if (strlen($model) <2){
        echo "le modele doit comporter au moins 2 caracteres";
    }else if (strlen($picture) <2){
        echo "le nom de la photo doit comporter au moins 2 caracteres";
    }else {
        echo 'Succès';
    }
}


// Ajout des données à la BDD
$query = $db->prepare("INSERT INTO tbl_cars (`brand`, `model`, `price`, `picture`) 
                                VALUES (:brand, :model, :price, :picture)");
$query->bindValue(':brand', $brand);
$query->bindValue(':model', $model);
$query->bindValue(':price', $price);
$query->bindValue(':picture', $picture);
$query->execute();
?>

    <!-- <ul id="success"></ul>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script>
    
    var form = $('form');
    form.on('submit', function (event) {
        // On n'exécute pas la requête POST directement
        event.preventDefault(); 
        // On récupère les données du formulaire
        var formData = form.serialize(); 
        // On exécute la requête POST via AJAX
        $.ajax({
            type: 'POST',
            url: form.attr('action'),
            data: formData,
            // On peut forcer le contenu en JSON si le serveur
            // ne renvoie pas la bonne en-tête
            // dataType: 'json'
        }).done(function (response) {
            $('h1').html(response);
        });
    });
    </script> -->
</body>
</html>
