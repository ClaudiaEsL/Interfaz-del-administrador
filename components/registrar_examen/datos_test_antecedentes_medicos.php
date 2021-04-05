<h2>Paso 4: Examen Predeportivo: Test Antecedentes medicos</h2>
                        <div class="row align-items-start bg-light border">
                            <div class="col p-2">
                                <label for="medico" class="form-label">Encargado de realizar el examen (Medico):</label >
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="medico" name="medico">
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
                                <label for="enfermedades_f" class="form-label">Enfermedades Familiares:</label>
                                <input type="text" class="form-control" id="enfermedades_f" name="enfermedades_f" >
                            </div>
                            <div class="col p-2">
                                <label for="enfermedades" class="form-label">Enfermedades:</label>
                                <input type="text" class="form-control" id="enfermedades" name="enfermedades" >
                            </div>
                            <div class="col p-2">
                                <label for="cirugias" class="form-label">Cirugias:</label>
                                <input type="text" class="form-control" id="cirugias" name="cirugias" >
                            </div>
                        </div>
                        <div class="row align-items-start bg-light border">
                            <div class="col p-2">
                                <label for="alergias" class="form-label">Alergias:</label>
                                <input type="text" class="form-control" id="alergias" name="alergias" >
                            </div>
                            <div class="col p-2">
                                <label for="lesiones" class="form-label">Lesiones:</label>
                                <input type="text" class="form-control" id="lesiones" name="lesiones" >
                            </div>
                            <div class="col p-2">
                                <label for="medicamentos" class="form-label">Medicamentos:</label>
                                <input type="text" class="form-control" id="medicamentos" name="medicamentos" >
                            </div>
                        </div>
                        <br>
                        <input type="button" name="previous" class="previous-form btn btn-default" value="Anterior" />
                        