<h4>Sección 3: Examen Predeportivo: Test físico</h4>
<div class="row align-items-start bg-light border">
    <div class="col p-2">
        <label for="preparador" class="form-label">Encargado de realizar el examen (Preparador Físico):</label >
        <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="preparador" name="preparador_fisico" required>
        <option  value="" disabled selected>-Seleccione una opción-</option>
        <?php
        /*Desplegar la lista de los preparadores fisicos*/
        $consulta3 =  mysqli_query($conn,"SELECT id_cuerpo_tecnico, nombre FROM cuerpo_tecnico WHERE id_cargo01 = '3'");
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
        <label for="estatura" class="form-label">Estatura:</label>
        <input type="number" class="form-control" id="estatura" name="estatura" placeholder="0.00" required>
    </div>
    <div class="col p-2">
        <label for="peso" class="form-label">Peso:</label>
        <input type="number" class="form-control" id="peso" name="peso" placeholder="0.00"  required>
    </div>
    <div class="col p-2">
        <label for="pulso" class="form-label">Pulso:</label>
        <input type="text" class="form-control" id="pulso" name="pulso"  required>
    </div>
</div>
<div class="row align-items-start bg-light border">
    <div class="col p-2">
        <label for="control_vista" class="form-label">Control de Vista:</label>
        <input type="text" class="form-control" id="control_vista" name="control_vista"  required>
    </div>
    <div class="col p-2">
        <label for="postura" class="form-label">Postura:</label>
        <input type="text" class="form-control" id="postura" name="postura"  required>
    </div>
    <div class="col p-2">
        <label for="articulaciones" class="form-label">Articulaciones:</label>
        <input type="text" class="form-control" id="articulaciones" name="articulaciones"  required>
    </div>
</div>
<div class="row align-items-start bg-light border">
    <div class="col p-2">
        <label for="resistencia" class="form-label">Resistencia:</label>
        <input type="text" class="form-control" id="resistencia" name="resistencia"  required>
    </div>
    <div class="col p-2">
        <label for="flexibilidad" class="form-label">Flexibilidad:</label>
        <input type="text" class="form-control" id="flexibilidad" name="flexibilidad"  required>
    </div>
    <div class="col p-2">
        <label for="tension_arterial" class="form-label">Tensión Arterial:</label>
        <input type="text" class="form-control" id="tension_arterial" name="tension_arterial"  required>
    </div>
</div>
<br>
<input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
<input type="button" name="next" class="next-form btn btn-primary" value="Siguiente" />