    
var form = $('form'); // selectionne le formulaire

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
        console.log(response);
        // $('h1').html(response);
    });
});
