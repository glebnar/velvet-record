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
var RegXpText = RegExp("^[1-9a-z A-Z\/]+$");
var RegXpYear = RegExp("^[1-9]{4}$")
var RegXpPrice = RegExp("^[1-9,.]+$")
$("#disc_title").on("input",function(){
    if (RegXpText.test($("#disc_title").val()) == false) {
        $("#disc_title").css("border","2px solid red");
    }else{
        $("#disc_title").css("border","2px solid green");  

    }

})
$("#new_artist_id").on("input",function(){
    if (RegXpText.test($("#new_artist_id").val()) == false) {
        $("#new_artist_id").css("border","2px solid red");
    }else{
        $("#new_artist_id").css("border","2px solid green");  

    }

})
$("#disc_label").on("input",function(){
    if (RegXpText.test($("#disc_label").val()) == false) {
        $("#disc_label").css("border","2px solid red");
    }else{
        $("#disc_label").css("border","2px solid green");  

    }

})
$("#disc_genre").on("input",function(){
    if (RegXpText.test($("#disc_genre").val()) == false) {
        $("#disc_genre").css("border","2px solid red");
    }else{
        $("#disc_genre").css("border","2px solid green");  

    }

})
$("#disc_year").on("input",function(){
    if (RegXpYear.test($("#disc_year").val()) == false) {
        $("#disc_year").css("border","2px solid red");
    }else{
        $("#disc_year").css("border","2px solid green");  

    }

})
$("#disc_price").on("input",function(){
    if (RegXpPrice.test($("#disc_price").val()) == false) {
        $("#disc_price").css("border","2px solid red");
    }else{
        console.log("test");
        $("#disc_price").css("border","2px solid green");  

    }

})