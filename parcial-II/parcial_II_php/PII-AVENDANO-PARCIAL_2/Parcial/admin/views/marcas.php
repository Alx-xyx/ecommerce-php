<?php
    require_once("../function/autoload.php");

    $marcas = new Marca;

    $lista = $marcas-> todasMarcas();
?>

<h2>Administración de Marcas</h2>
<table class="table table-striped">
<thead>
<tr>
    <th>ID</th>
    <th>Name</th>
</tr>
</thead>
<tbody>

<?php

foreach ($lista as $marca) {
    ?>
    <tr>
        <td><?= $marca -> getIdMarca();?></td>
        <td><?= $marca -> getMarca();?></td>
        <td>
        <a href="?sec=editar_marca&id=<?=$marca->getIdMarca();?>" class="btn btn-warning">Editar</a>
        <a href="?sec=borrar_marca$id=<?=$marca->getIdMarca();?>" class="btn btn-danger">Borrar</a>
        </td>
    </tr>
    <?php
}
?>
</tbody>
</table>

<a href="?sec=crear_producto" class="btn btn-primary">Crear marca</a>