<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AJAX - les bases</title>
</head>
<body>
    
    <h1>Mon site</h1>

    <button id="bouton">Changer la phrase</button>

    <script>
        // On instancie le moteur AJAX
        var xhr = new XMLHttpRequest();

        // On veut suivre l'évolution de la requête AJAX
        xhr.addEventListener('readystatechange', function () {
            if (4 === xhr.readyState) { // La requête est terminée
                if (200 === xhr.status) { // La réponse a un status code 200
                    // On récupère la réponse HTTP
                    console.log(xhr.response);
                    document.getElementsByTagName('h1')[0].innerHTML = xhr.response;
                }
            }
        });

        // Exécuter une requête HTTP
        xhr.open('GET', './worker.php');
        xhr.send();

        /**
         * Exercice
         * 1. Ecouter l'événement au clic sur le bouton
         * 2. A chaque clic, on exécute une nouvelle requête AJAX sur le serveur
         * pour récupérer une nouvelle phrase et modifier le contenu du h1.
         */


    
        var button = document.getElementById('bouton');
        button.addEventListener('click', function() {
            xhr.open('GET', './worker.php');
            xhr.send();
        });


    </script>

    
</body>
</html>