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