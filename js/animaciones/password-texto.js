function mostrarPassword(){
    var cambio = document.getElementById("txtPassword");
    if(cambio.type == "password"){
        cambio.type = "text";
        $('#icono').removeClass('bi-eye-slash-fill').addClass('bi-eye-fill');
    }else{
        cambio.type = "password";
        $('#icono').removeClass('bi-eye-fill').addClass('bi-eye-slash-fill');
    }
}
