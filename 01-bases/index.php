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

    </script>

</body>
</html>