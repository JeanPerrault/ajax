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
            // $price  = isset($_POST['price']) ? trim($_POST['price']) : null;
            $price  = intval($_POST['price']) ? trim($_POST['price']) : null;
            // $picture  = isset($_POST['picture']) ? trim($_POST['picture']) : null;
            $picture  = $_FILES['picture'];

            $errors = [];

            if (strlen($brand) <= 2) {
                $errors['brand'] = 'Marque invalide.';
            }

            if (strlen($model) <= 2) {
                $errors['model'] = 'Modèle invalide.';
            }

            if (!is_numeric($price) || $price < 1) {
                $errors['price'] = 'Prix invalide.';
            }
            // on teste le type d'erreur
            if($picture['error']!==0){
                $errors['picture'] = 'Vous n\'avez pas ajouté d\'image.';
            }
            // l'image est un jpg, jpeg, png, gif
            if(!isset($errors['picture'])){
                $extension=pathinfo($picture['name'])['extension']; // renvoie l extension du fichier uploadé
                if(!in_array(strtolower($extension),['jpg','jpeg','png','gif'])){
                    $errors['picture'] = 'Image non valide';
                }
                // if (!preg_match('/\.(jpg|jpeg|png|gif)$/mi', $extension)) {
                //     $errors['image'] = 'Image pas valide';
                // }
            }

            var_dump($errors);

                          
        
            // Ajout des données à la BDD
            if (empty($errors)) {

            // on fait l'upload
            var_dump($picture);
            // on stocke le nom de l'image dans le repertoire
            // on créé le repertoire img avant de mette le nom d'image
            $filename = uniqid().'_'.$picture['name'];
            move_uploaded_file($picture['tmp_name'],'test_'.$filename);
            // move_uploaded_file($picture['tmp_name'], __DIR__ .'/img/'.$filename);


            $query = $db->prepare("INSERT INTO tbl_cars (`brand`, `model`, `price`, `picture`) 
            VALUES (:brand, :model, :price, :picture)");
            $query->bindValue(':brand', $brand);
            $query->bindValue(':model', $model);
            $query->bindValue(':price', $price);
            $query->bindValue(':picture', $filename);
            if ($query->execute()) {
                echo '<div class="alert alert-success">
                    La voiture a été ajoutée!
                </div>';
            }
            }
        }
        
        
        
        ?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <form class="crud-form"  method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="brand">Brand</label>
                        <input class="form-control" type="text" name="brand" id="brand" >
                    </div>

                    <div class="form-group">
                        <label for="model">Model</label>
                        <input class="form-control" type="text" name="model" id="model" >
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input class="form-control" type="text" name="price" id="price" >
                    </div>

                    <div class="form-group">
                        <label for="picture">Picture</label>
                        <input class="form-control" type="file" name="picture" id="picture" >
                    </div>

                    <button type="submit" class="btn btn-success btn-block">Valider</button>

                    <h1></h1>
                </form>
            </div>
        </div>
    </div>



   
</body>
</html>
