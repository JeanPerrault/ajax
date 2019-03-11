<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        $(document).ready(function () {
            // Exécuter une requête AJAX (en GET) avec jQuery
            $.get('../01-bases/worker.php').done(function (response) {
                alert(response);
            }).fail(function (xhr) {
                alert('La requête a échoué avec un status '+xhr.status);
            });

            // Exécuter une requête AJAX (en POST)
            // worker.php?sentence=Salut les gens
            $.ajax({
                type: 'POST',
                data: { sentence: 'Salut les gens' },
                url: './worker.php'
            }).done(function (response) {
                console.log(response);
            });
        });
    </script>
</body>
</html>
