<?php
    require_once("../function/autoload.php");

    $producto = new Producto;

    $lista = $producto -> todosProductos();
?>

<h2>Administración de Productos</h2>
<table class="table table-striped">
<thead>
<tr>
    <th>ID</th>
    <th>Brand</th>
    <th>Name</th>
    <th>Collection</th>
    <th>Size</th>
    <th>Type</th>
    <th>Desc</th>
    <th>Img</th>
</tr>
</thead>
<tbody>

<?php

foreach ($lista as $producto) {
    ?>
    <tr>
        <td><?= $producto -> getIdProducto();?></td>
        <td><?= $producto -> getMarca();?></td>
        <td><?= $producto -> getName();?></td>
        <td><?= $producto -> getCollection();?></td>
        <td><?= $producto -> getSize();?></td>
        <td><?= $producto -> getType();?></td>
        <td><?= $producto -> getDescripcion();?></td>
        <td>
        <a href="?sec=editar_producto&id=<?=$producto->getIdProducto();?>" class="btn btn-warning">Editar</a>
        <a href="?sec=borrar_producto$id=<?=$producto->getIdProducto();?>" class="btn btn-danger">Borrar</a>
        </td>
    </tr>
    <?php
}
?>
</tbody>
</table>

<a href="?sec=crear_producto" class="btn btn-primary">Crear producto</a>