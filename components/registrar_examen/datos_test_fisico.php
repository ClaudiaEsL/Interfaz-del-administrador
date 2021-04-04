<h2>Paso 3: Examen Predeportivo: Test fisico</h2>
                        <div class="row align-items-start bg-light border">
                            <div class="col p-2">
                                <label for="preparador" class="form-label">Encargado de realizar el examen (Preparador Fisico):</label >
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="preparador" name="eleccion">
                                <option  value="" disabled selected>-Lista de encargados registrados-</option>
                                <?php
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
                                <input type="text" class="form-control" id="estatura" name="estatura" >
                            </div>
                            <div class="col p-2">
                                <label for="peso" class="form-label">Peso:</label>
                                <input type="text" class="form-control" id="peso" name="peso" >
                            </div>
                            <div class="col p-2">
                                <label for="pulso" class="form-label">Pulso:</label>
                                <input type="text" class="form-control" id="pulso" name="pulso" >
                            </div>
                        </div>
                        <div class="row align-items-start bg-light border">
                            <div class="col p-2">
                                <label for="control_vista" class="form-label">Control de Vista:</label>
                                <input type="text" class="form-control" id="control_vista" name="control_vista" >
                            </div>
                            <div class="col p-2">
                                <label for="postura" class="form-label">Postura:</label>
                                <input type="text" class="form-control" id="postura" name="postura" >
                            </div>
                            <div class="col p-2">
                                <label for="articulaciones" class="form-label">Articulaciones:</label>
                                <input type="text" class="form-control" id="articulaciones" name="articulaciones" >
                            </div>
                        </div>
                        <div class="row align-items-start bg-light border">
                            <div class="col p-2">
                                <label for="resistencia" class="form-label">Resistencia:</label>
                                <input type="text" class="form-control" id="resistencia" name="resistencia" >
                            </div>
                            <div class="col p-2">
                                <label for="flexibilidad" class="form-label">Flexibilidad:</label>
                                <input type="text" class="form-control" id="flexibilidad" name="flexibilidad" >
                            </div>
                            <div class="col p-2">
                                <label for="tension_arterial" class="form-label">Tension Arterial:</label>
                                <input type="text" class="form-control" id="tension_arterial" name="tension_arterial" >
                            </div>
                        </div>
                        <br>
                        <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                        <input type="button" name="next" class="next-form btn btn-primary" value="Siguiente" />