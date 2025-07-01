<?php

require_once("../../classes/Conexion.php");
require_once("../../classes/Producto.php");

//** Obtengo los datos que recivo tanto de mi clase producto como imagen */
$id = $_GET['id'] ?? null;

//! Echo de datos, SOLO TESTING NO BORRAR !
echo "<pre>";
print_r($id);
echo "</pre>";

if (!$id || !is_numeric($id)) {
    // header("Location: ../index.php?sec=productos&status=error");
};


try {
    $deletedProduct = Producto::deleteProduct((int)$id);
    if ($deletedProduct) {
        header("Location: ../index.php?sec=productos&status=deleted");
    } else{
        // header("Location: ../index.php?sec=productos&status=error");
    };
    exit;
} catch (Exception $e) {
    echo "<h4>Error al eliminar el producto:</h4>";
    echo "<strong>Mensaje:</strong> " . $e->getMessage() . "<br>";
    echo "<strong>Archivo:</strong> " . $e->getFile() . "<br>";
    echo "<strong>Línea:</strong> " . $e->getLine() . "<br>";
    echo "<pre><strong>Trace:</strong><br>" . $e->getTraceAsString() . "</pre>";
        // header("Location: ../index.php?sec=productos&status=error");
    exit;
};

// header("Location: ../index.php?sec=productos&status=error");
exit;

?>
