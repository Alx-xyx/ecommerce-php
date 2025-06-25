<?php
    session_start();
    //! El autoload sirve para cargar de manera automatica la clase necesaria y omitir buscar y requerir los archivos que necesito en una vista
    spl_autoload_register('autoloadClasses');

    function autoloadClasses($nombreClase){
        $archivoClase = __DIR__."/../classes/$nombreClase.php";
        
        if (file_exists($archivoClase)) {
            require_once($archivoClase);
        } else {
            die("No se pudo cargar la clase: $nombreClase");
        }
    }
?>