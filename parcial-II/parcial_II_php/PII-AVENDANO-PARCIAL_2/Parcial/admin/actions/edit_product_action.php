<?php
    require_once("../../classes/Conexion.php");
    require_once("../../classes/Producto.php");
    require_once("../classes/Imagen.php");

    $postData = $_POST;
    $fileData = $_FILES['foto'];

    echo "<pre>";
    print_r($postData);
    echo "</pre>";

    echo "<pre>";
    print_r($fileData);
    echo "</pre>";

    try {
        $producto = Producto::getProductById($postData["product_id"]);

        //^ Inicializo una imagen ya que no es necesario cambiar la imagen a veces
        $imagen = $postData['imagen_or'];

        if ($fileData['error'] === 0 && $fileData['size'] > 0) {
            $imagenNueva = Imagen::uploadImage("../../assets/products", $fileData);
            if ($imagenNueva) {
                Imagen::deleteImage("../../assets/products/" . $postData['imagen_or']);
                $imagen = $imagenNueva;
            } else {
                throw new Exception("No se ha podido subir una imagen nueva");
            }
        } elseif ($fileData['error'] !== 4){
            throw new Exception('Error al subir el archivo, codigo:' . $fileData['error']);
        }

        $producto -> editMin(
            $postData['producto'],
            $postData['product_id'],
            $postData['marca'],
            $postData['descripcion'],
            $imagen
        );

        $producto -> editMinSize(
            $postData['product_id'],
            $postData['size']
        );
        header("Location: ../index.php?sec=productos&status=ok");
    } catch (Exception $e) {
        echo "<h4>Error al editar el producto:</h4>";
        echo "<strong>Mensaje:</strong> " . $e->getMessage() . "<br>";
        echo "<strong>Archivo:</strong> " . $e->getFile() . "<br>";
        echo "<strong>Línea:</strong> " . $e->getLine() . "<br>";
        echo "<pre><strong>Trace:</strong><br>" . $e->getTraceAsString() . "</pre>";
        die("No se ha podido editar el producto");
        exit;
    }

    header("Location: ../index.php?sec=productos&status=ok");
    exit;

?>