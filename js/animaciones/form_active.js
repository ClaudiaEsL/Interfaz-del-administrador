function activar_formulario(){
    document.getElementById('inputEmail').disabled = false;
    document.getElementById('inputusuario').disabled = false;
    document.getElementById('inputname').disabled = false;
    /*Ocultamos el boton editar*/
    var edit = document.getElementById('editar-1');
    edit.style.display = "none";
    /*Mostramos los botones de opciones*/
    var btn = document.getElementById('editar');
    btn.style.display = "block";
}
function desactivar_formulario(){
    document.getElementById('inputEmail').disabled = true;
    document.getElementById('inputusuario').disabled = true;
    document.getElementById('inputname').disabled = true;
    /*Mostramos el boton editar*/
    var edit = document.getElementById('editar-1');
    edit.style.display = "block";
    /*Ocultamos los botones de opciones*/
    var cancelar = document.getElementById('editar');
    cancelar.style.display = "none";
}