// affichage de la miniature 
function loadImg(event){
        $("#frame").css("display","block");
        $('#frame').attr('src', URL.createObjectURL(event.target.files[0]));
    };
$("#new_artist_btn").on("click", function(){
$("#new_artist_toggle").toggle();
$("#new_artist_id").val(undefined);
$("#list_artist_toggle").toggle();

});


function Suppression() {

    //Rappel : confirm() -> Bouton OK et Annuler, renvoit true (OK) ou false (Annuler)
    var resultat = confirm("Etes-vous certain de vouloir supprimer cet enregistrement ?");


    //annulation du comportemnt par défaut 
    if (resultat == false) {

        event.preventDefault();
        document.location.href = "index.php";
    }
}