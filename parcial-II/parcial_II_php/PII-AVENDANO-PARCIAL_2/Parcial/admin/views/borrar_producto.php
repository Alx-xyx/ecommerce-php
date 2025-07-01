<?php
require_once("../classes/Producto.php");
require_once("../classes/Conexion.php");


$id = isset($_GET['id']) && is_numeric($_GET['id']) ? (int)$_GET['id'] : null;


if (!$id) {
    echo "<p class='text-danger'>ID no valido</p>";
    echo '<a href="?sec=productos" class="btn btn-primary">volver</a>';
};

$product = Producto::getProductById($id);

if (!$product) {
    echo "<p class='text-danger'>Producto no encontrado</p>";
};
?>

<h2>Borrado de producto</h2>
<p>Entraste en la ventana para borrar un producto de manera
    definitiva de la base de datos. Por favor, chequee bien
    que esta borrando el producto correspondiente
</p>
<div class="row">
    <div class="col-12">
        <h2>Producto a borrar</h2>
        <p><?= $product -> getName(); ;?></p>
    </div>
    <div class="col-12">
    <a href="actions/delete_product_action.php?id=<?= $product->getIdProducto(); ?>" class="btn btn-danger">Eliminar producto</a>    
    <a href="?sec=productos" class="btn btn-primary">Cancelar</a>
    </div>
</div>