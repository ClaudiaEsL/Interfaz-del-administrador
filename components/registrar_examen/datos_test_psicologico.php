<h4> Sección 2: Examen Psicológico</h4>
<div class="row align-items-start bg-light border">
    <div class="col p-2">
        <label for="psicologo" class="form-label">Encargado de realizar el examen (Psicólogo):</label>
        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="psicologo" name="psicologo">
        <option  value="" disabled selected>-Seleccione una opción-</option>
        <?php
        /*Desplegar los datos de la lista de psicologos registrados */
        $consulta3 =  mysqli_query($conn,"SELECT id_cuerpo_tecnico, nombre FROM cuerpo_tecnico WHERE id_cargo01 = '7'");
        while($entrenador = mysqli_fetch_array($consulta3)){
        ?>
            <option  value="<?= $entrenador['id_cuerpo_tecnico']?>"><?= $entrenador['nombre']?></option>
        <?php
            }
        ?>
        </select>
    </div>
</div>
<div class="row align-items-start bg-light border">
    <div class="col p-2">
        <label for="eleccion" class="form-label">Elección de respuesta:</label>
        <input type="text" class="form-control" id="eleccion" name="eleccion">
    </div>
    <div class="col p-2">
        <label for="rapidez" class="form-label">Rapidez mental:</label>
        <input type="text" class="form-control" id="rapidez" name="rapidez">
    </div>
</div>
<div class="row align-items-start bg-light border">
    <div class="col p-2">
        <label for="efect_tactica_mental" class="form-label">Táctica mental:</label>
        <input type="text" class="form-control" id="efect_tactica_mental" name="efect_tactica_mental">
    </div>
</div>
<div class="row align-items-start bg-light border">
    <div class="col p-2">
        <label for="observaciones" class="form-label">Observaciones:</label>
        <textarea aria-label="With textarea" class="form-control" id="observaciones" name="observaciones"></textarea>
    </div>
</div>
<br>
<!--Opciones-->
<input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
<input type="button" name="next" class="next-form btn btn-primary" value="Siguiente" />