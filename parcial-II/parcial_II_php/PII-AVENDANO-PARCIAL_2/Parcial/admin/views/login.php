<?php

//* El login muestra un formulario para que el usuario pueda logearse en la pagina y pasar la autenticacion.
require_once("../../function/autoload.php");

$postData = $_POST;
//$login = Autenticacion::logIn($postData['usuario'], $postData = ['clave']);

?>

<section class="container">
    <form action="actions/login.php" method="post" enctype="multipart/form-data">
        <h1 class="h3 mb-3 fw-normal">Iniciar Sesión</h1>
        <div>
            //Alerta::get_alertas();
        </div>
        <div class="form-floating m-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Usuario" name="usuario">
            <label for="floatingInput">Nombre de usuario</label>
        </div>
        <div class="form-floating m-3">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Clave" name="clave">
            <label for="floatingPassword">Clave</label>
        </div>
        <input type="submit" value="Login" class="btn btn-primary w-100 py-2 m-3">
    </form>
</section>