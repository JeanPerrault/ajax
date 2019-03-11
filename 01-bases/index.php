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
        // on instancie le moteur AJAX
        var xhr = new XMLHttpRequest();

        // On veut suivre l'évolution de la requête AJAX
        xhr.addEventListener('readystatechange', function () {
            if (4 === xhr.readyState) {
                if (200 === xhr.status) {
                    // on recupere la reponse HTTP
                    console.log(xhr.response);
                    document.getElementsByTagName('h1')[0].innerHTML = xhr.response;
                }
            }
        });

        // executer une requete HTTP
        xhr.open('GET', './worker.php');
        xhr.send();

        /**
         * Exercice
         * 1. ecouter l evenement au clic sur le bouto
         * 2. a chaque ligne on execute une nouvelles requete AJAX sur le serveur
         * pour recuperer une nouvelle phrase et modifier le contenu du h1.
         */
        var button = document.getElementById('bouton');
        button.addEventListener('click', function() {
            xhr.open('GET', './worker.php');
            xhr.send();
        });


    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.js"
    integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous"></script>
</body>
</html>