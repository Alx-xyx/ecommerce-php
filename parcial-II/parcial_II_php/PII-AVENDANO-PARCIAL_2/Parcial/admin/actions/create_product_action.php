<?php

require_once("../../classes/Conexion.php");
require_once("../../classes/Producto.php");

$postData = $_POST;

echo "<pre>";
print_r($postData);
echo "</pre>";

try {
    Producto::insert(
        $postData['name'],
        $postData['brand'],
        $postData['collection'],
        $postData['size'],
        $postData['type'],
        $postData['descripcion']
    );
} catch (Exception $e) {
    die('No se pudo cargar el producto');
}

?>