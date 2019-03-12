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
                <form class="crud-form" action= "../03-formulaire/worker.php" method="post">

                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input class="form-control" type="text" name="name" id="name">
                    </div>

                    <div class="form-group">
                        <label for="descrip">Message</label>
                        <textarea class="form-control" name="mess" id="mess"></textarea>
                    </div>


                    <button type="submit" class="btn btn-success btn-block">Valider</button>

                    <h1></h1>
                </form>
            </div>
        </div>
    </div>

    <ul id="success"></ul>

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
    </script>
</body>
</html>
