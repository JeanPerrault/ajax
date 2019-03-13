<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>
<body>

    <!-- <h1></h1>
    <ul id="voiture"></ul>

    <div id="selected_car"></div> -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
    $.get('./cars.php').done(function (data) {
        for(var i=0;i<data.length;i++){
            // $('#voiture').append($('<li>'+data[i].brand+'  '+data[i].model+' <br /> '+ $("<img scr=./"+data[i].picture+">") +' <br /> Prix : '+data[i].price+'€'+'</li>'));
            $('#voiture').append($('<li>'+data[i].brand+'  '+data[i].model+' <br /> Prix : '+data[i].price+'€'+'</li>'));
            $('#voiture').append($('<img id="image" src=./'+data[i].picture+'>'));
        }
        
    });

    // On écoute le clic sur un élément qui est chargé en AJAX
    $('#image').on('click', function (event) {
            event.preventDefault(); // Bloque la redirection du lien
            $.get('./cars.php').done(function (data) {
        for(var i=0;i<data.length;i++){
            $('#selected-car').html(data[i].brand + ' ' + data[i].model + ' ' + data[i].price + '&euro;' + '<img width="500" src="./img/'+data[i].image+'">');
        }
        
    });        
                
    });
    </script>
</body>
</html>