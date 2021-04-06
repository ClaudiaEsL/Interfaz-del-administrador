function activar_formulario_estadisticas(){
    /*Ejemplo para replicar */
    document.getElementById('id_jugador').disabled = false;
    document.getElementById('torneo').disabled = false;
    document.getElementById('partidos_jugados').disabled = false;
    document.getElementById('goles').disabled = false;
    document.getElementById('remates').disabled = false;
    document.getElementById('asistencia').disabled = false;
    document.getElementById('min_jugados').disabled = false;
    document.getElementById('faltas_recibidas').disabled = false;
    document.getElementById('pases').disabled = false;
    document.getElementById('goles_penalti').disabled = false;
    document.getElementById('balones_recuperados').disabled = false;
    document.getElementById('faltas_cometidas').disabled = false;
    document.getElementById('partidos_titular').disabled = false;
    document.getElementById('partidos_suplente').disabled = false;
    document.getElementById('goles_cabeza').disabled = false;
    document.getElementById('goles_pie_der').disabled = false;
    document.getElementById('goles_pie_izq').disabled = false;
    document.getElementById('penaltis_lanzados').disabled = false;
    document.getElementById('goles_falta_directa').disabled = false;
    document.getElementById('goles_recibidos').disabled = false;
    document.getElementById('partidos_inabilitado').disabled = false;
    document.getElementById('goles_centro').disabled = false;
    document.getElementById('goles_fuera').disabled = false;
    document.getElementById('paradas_centro').disabled = false;
    document.getElementById('paradas_fuera').disabled = false;

    /*Ocultamos el boton editar*/
    var edit = document.getElementById('btn-editar');
    edit.style.display = "none";
    /*Mostramos los botones de opciones*/
    var btn = document.getElementById('opciones-edicion');
    btn.style.display = "flex";
}
function desactivar_formulario_estadisticas(){


    document.getElementById('id_jugador').disabled = false;
    document.getElementById('torneo').disabled = false;
     document.getElementById('partidos_jugados').disabled = true;
    document.getElementById('goles').disabled = true;
    document.getElementById('remates').disabled = true;
    document.getElementById('asistencia').disabled = true;
    document.getElementById('min_jugados').disabled = true;
    document.getElementById('faltas_recibidas').disabled = true;
    document.getElementById('pases').disabled = true;
    document.getElementById('goles_penalti').disabled = true;
    document.getElementById('balones_recuperados').disabled = true;
    document.getElementById('faltas_cometidas').disabled = true;
    document.getElementById('partidos_titular').disabled = true;
    document.getElementById('partidos_suplente').disabled = true;
    document.getElementById('goles_cabeza').disabled = true;
    document.getElementById('goles_pie_der').disabled = true;
    document.getElementById('goles_pie_izq').disabled = true;
    document.getElementById('penaltis_lanzados').disabled = true;
    document.getElementById('goles_falta_directa').disabled = true;
    document.getElementById('goles_recibidos').disabled = true;
    document.getElementById('partidos_inabilitado').disabled = true;
    document.getElementById('goles_centro').disabled = true;
    document.getElementById('goles_fuera').disabled = true;
    document.getElementById('paradas_centro').disabled = true;
    document.getElementById('paradas_fuera').disabled = true;

    /*Mostramos el boton editar*/
    var edit = document.getElementById('btn-editar');
    edit.style.display = "block";
    /*Ocultamos los botones de opciones*/
    var cancelar = document.getElementById('opciones-edicion');
    cancelar.style.display = "none";
}