<?php
    //? Importo mi clase sections para usarlas
    require_once "classes/Secciones.php";

    //? Declaro mis secciones validas
    $validSections = Secciones::validSections();

    //? Llamo a las secciones que deberian de accederse en el menu
    $menuSections = Secciones::menu_sections();

    //Isset para analizar si mi get obtiene la section correspondiente. Si no consigue una seccion valida, la section se convierte en home
    $seccion = isset($_GET['sec']) ? $_GET['sec'] : 'home';

    //Analizo si la seccion esta en el array de secciones validas. Si no esta, devuelvo un error 404
    if (!in_array($seccion, $validSections)) {
        $vista = '404';
    } else {
        $vista = $seccion;
    }

    //? LLamo a las secciones que aparecen para el usuario
    $secciones = Secciones::sectionsUser();
    $titleSection = "";
    foreach($secciones as $value){
        if ($value -> getVinculo() == $vista) {
            $titleSection = $value -> getTitle();
        }
    }

    $cssBootstrap = '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">';
    $scriptBootstrap = '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>';


    
    ?>
<!DOCTYPE html>
<html lang="es">
    <?php
    include_once "./includes/head.php";
    include_once "./includes/body.php";
    include_once "./includes/footer.php"
    ?>
</html>