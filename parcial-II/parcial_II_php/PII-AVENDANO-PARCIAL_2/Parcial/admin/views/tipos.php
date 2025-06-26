<?php
    require_once("../function/autoload.php");

    $type = new Tipo;

    $lista = $type-> todosTipos();
?>

<h2>Administración de Tipos</h2>
<table class="table table-striped">
<thead>
<tr>
    <th>ID</th>
    <th>Name</th>
</tr>
</thead>
<tbody>

<?php

foreach ($lista as $type) {
    ?>
    <tr>
        <td><?= $type -> getIdType();?></td>
        <td><?= $type -> getType();?></td>
        <td>
        <a href="?sec=editar_type&id=<?=$type->getIdType();?>" class="btn btn-warning">Editar</a>
        <a href="?sec=borrar_type$id=<?=$type->getIdType();?>" class="btn btn-danger">Borrar</a>
        </td>
    </tr>
    <?php
}
?>
</tbody>
</table>

<a href="?sec=crear_producto" class="btn btn-primary">Crear marca</a>