    
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
        $('#messages').append(`
        <div class="media mt-5">
            <div class="media-body">
                <h5>`+response.pseudo+` à `+response.date+`</h5>
                `+response.message+`
            </div>
            <img width="130" src="moi.jpg" alt="`+response.pseudo+`">
        </div>

        `);
    });
});

// recupere tous les messages qd on arrive sur le tchat
setInterval(function(){
    $.get('./list-message.php').done(function(messages){
        $('#messages').html('');
        for(message of messages){
            $('#messages').append(`
            <div class="media mt-5">
                <div class="media-body">
                    <h5>`+message.pseudo+` à `+message.date+`</h5>
                    `+message.message+`
                </div>
                <img width="130" src="moi.jpg" alt="`+message.pseudo+`">
            </div>

            `);
        }
    })
},1000);