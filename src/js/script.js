// affichage de la miniature 
function loadImg(event){
        $('#frame').attr('src', URL.createObjectURL(event.target.files[0]));
    };