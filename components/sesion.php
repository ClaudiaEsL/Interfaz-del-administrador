<button class="btn" id="abrir" onclick="abrir()" style="color:white;">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16" >
    <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
    </svg>
</button>
<?php if(!empty($user)):?>
<div class="nombre_usuario">
    <h5>Bienvenido usuario <?= $user['nombre']?></h5> 
</div>
<div class="cerrar_sesion">
    <h5><a type="button" href="close_sesion.php" style="color:white;">Salir</a></h5>
</div>
<?php else:
    require 'index.php';
endif;?>
<script src="js/animaciones/menu.js"></script>