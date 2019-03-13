<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tchat Webforce</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" 
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" 
        crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Tchat Webforce</h1>
        <div id="messages">
            <div class="media mt-5">
                <div class="media-body">
                    <h5>Jean à 13h47</h5>
                        Hello....
                </div>
                <img width="130" src="moi.jpg" alt="Jean">
            </div>
            <div class="media mt-5">
                <div class="media-body">
                    <h5>Jean à 14h47</h5>
                        Hello....
                </div>
                <img width="130" src="moi.jpg" alt="Jean">
            </div>
        </div>
        <form class="mt-5" action="./message.php" method="post">
            <div class="row">
                <div class="col-md-10">
                    <input type="text" name="pseudo" id="pseudo" class="form-control"placeholder="Votre Pseudo">
                    <textarea name="message" id="message" class="form-control" placeholder="Votre Message"></textarea>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary btn-block">Envoyer</button>
                </div>
            </div>
        </form>

    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="./app.js"></script>

</body>
</html>