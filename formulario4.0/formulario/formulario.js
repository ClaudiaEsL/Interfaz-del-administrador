//(funcion)(){
    var formulario = document.getElementById('formulario'),
		nombre = formulario.nombre,
        apellido_p = formulario.apellido_p,
        apellido_m = formulario.apellido_m,
        lugar_nacimiento = formulario.lugar_nacimiento,
        fecha_nacimiento = formulario.fecha_nacimiento,
        id_categoria = formulario.id_categoria,
        id_examen = formulario.id_examen,
        id_posicion = formulario.id_posicion,
        id_cuerpo_tecnico = formulario.id_cuerpo_tecnico,
        /*FORMULARIO JUGADOR*/

		error = document.getElementById('error');
function validarNombre(e){
    if(nombre.value == '' || nombre == null){
        console.log('Completa el nombre');
        error.style.display = 'block';
        error.innerHTML = error.innerHTML + '<li>Ingresa Un Nombre</li>';
        e.preventDefault();
        }else{
            error.style.display='none';
        }
}   

function validarApellidoP(e){
    if(apellido_p.value == '' || apellido_p == null){
        console.log('Completa el Apellido Paterno');
        error.style.display = 'block';
        error.innerHTML = error.innerHTML + '<li>Ingresa Apellido Paterno/li>';
        e.preventDefault();
        }else{
            error.style.display='none';
        }
}   

function validarLugarNacimiento(e){
     if(lugar_nacimiento.value == '' || lugar_nacimiento == null){
        console.log('Completa Lugar de nacimiento');
        error.style.display = 'block';
        error.innerHTML = error.innerHTML + '<li>Ingresa Lugar De Nacimineto</li>';
        e.preventDefault();
        }else{
            error.style.display='none';
        }
}

function validarFechaNacimiento(e){
     if(fecha_nacimiento.value == '' || fecha_nacimiento == null){
        console.log('Completa el Apellido Materno');
        error.style.display = 'block';
        error.innerHTML = error.innerHTML + '<li>Ingresa Apellido Materno</li>';
        e.preventDefault();
        }else{
            error.style.display='none';
        }
}

function validarIdCategoria(e){
     if(id_categoria.value == '' || id_categoria == null){
        console.log('Añade Una Categoria');
        error.style.display = 'block';
        error.innerHTML = error.innerHTML + '<li>Ingrese Categoria</li>';
        e.preventDefault();
        }else{
            error.style.display='none';
        }
}

function validarIdPosicion(e){
     if(id_posicion.value == '' || id_posicion == null){
        console.log('Igrese Posicion De Jugador');
        error.style.display = 'block';
        error.innerHTML = error.innerHTML + '<li>Ingrese Categoria</li>';
        e.preventDefault();
        }else{
            error.style.display='none';
        }
}

function validarIdExamen(e){
     if(id_examen.value == '' || id_examen == null){
        console.log('Igrese Examen');
        error.style.display = 'block';
        error.innerHTML = error.innerHTML + '<li>Ingrese Examen</li>';
        e.preventDefault();
        }else{
            error.style.display='none';
        }
}

function validarIdCuerpoTecnico(e){
     if(id_cuerpo_tecnico.value == '' || id_cuerpo_tecnico == null){
        console.log('Igrese Examen');
        error.style.display = 'block';
        error.innerHTML = error.innerHTML + '<li>Ingrese Examen</li>';
        e.preventDefault();
        }else{
            error.style.display='none';
        }
}

function validarSexo(e){
    if(sexo.value == '' || sexo.value == null){
        console.log('Selecciona Un Sexo');
        error.style.display = 'block';
        error.innerHTML = error.innerHTML + '<li>Selecciona Un Sexo</li>';
        e.preventDefault();
    }else{
    error.style.display='none';
    }
}
function validarTerminos(e){
    if(terminos.checked == false){
        console.log('Acepta Los Terminos');
        error.style.display = 'block';
        error.innerHTML = error.innerHTML + '<li>Acepta Los Terminos</li>';
        e.preventDefault();
    }else if(nombre.value == '' || nombre == null || correo.value == '' || correo == null || sexo.value == '' || sexo.value == null){
    error.style.display='block';
    }
}

function validarForm(e){
   error.innerHTML = '';
   error.style.display = 'block';
   validarNombre(e);
   validarCorreo(e);
   validarSexo(e);
   validarTerminos(e);
}


formulario.addEventListener('submit', validarForm);

//}())