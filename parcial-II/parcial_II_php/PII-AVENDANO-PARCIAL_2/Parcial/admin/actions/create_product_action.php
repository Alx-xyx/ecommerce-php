<?php

require_once("../../classes/Conexion.php");
require_once("../../classes/Producto.php");
require_once("../classes/Imagen.php");

//** Obtengo los datos que recivo tanto de mi clase producto como imagen */
$postData = $_POST;
$dataArchive = $_FILES['img'];

//! Echo de datos, SOLO TESTING NO BORRAR !
echo "<pre>";
print_r($postData);
echo "</pre>";

echo "<pre>";
print_r($dataArchive);
echo "</pre>";

//! Obligo a que tanto type como size sean un array

$sizes = isset($postData['size']) ? (array) $postData['size'] : [];
$types = isset($postData['type']) ? (array) $postData['type'] : [];


try {
    $img = Imagen::uploadImage("../../assets/products", $dataArchive) ;
    Producto::insert(
        $postData['name'],
        $postData['brand'],
        $postData['collection'],
        $postData['size'],
        $postData['type'],
        $postData['descripcion'],
        $img
    );
} catch (Exception $e) {
    echo "<h4>Error al cargar el producto:</h4>";
    echo "<strong>Mensaje:</strong> " . $e->getMessage() . "<br>";
    echo "<strong>Archivo:</strong> " . $e->getFile() . "<br>";
    echo "<strong>Línea:</strong> " . $e->getLine() . "<br>";
    echo "<pre><strong>Trace:</strong><br>" . $e->getTraceAsString() . "</pre>";
    exit; // Cortá la ejecución si hubo error
}

?>