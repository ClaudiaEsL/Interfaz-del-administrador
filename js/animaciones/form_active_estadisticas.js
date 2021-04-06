function activar_formulario_estadisticas(){
    /*Ejemplo para replicar */
    document.getElementById('paradas_fuera').disabled = false;

    /*Ocultamos el boton editar*/
    var edit = document.getElementById('btn-editar');
    edit.style.display = "none";
    /*Mostramos los botones de opciones*/
    var btn = document.getElementById('opciones-edicion');
    btn.style.display = "flex";
}
function desactivar_formulario_estadisticas(){
    document.getElementById('paradas_fuera').disabled = true;
    /*Mostramos el boton editar*/
    var edit = document.getElementById('btn-editar');
    edit.style.display = "block";
    /*Ocultamos los botones de opciones*/
    var cancelar = document.getElementById('opciones-edicion');
    cancelar.style.display = "none";
}