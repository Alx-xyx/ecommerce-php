<?php
    require_once("../classes/Producto.php");
    require_once("../classes/Conexion.php");
    require_once("../classes/Marca.php");

    $id = isset($_GET['id']) && is_numeric($_GET['id']) ? (int)$_GET['id'] : null;

    if (!$id) {
        echo "<p class='text-danger'>ID no valido</p>";
        echo '<a href="?sec=productos" class="btn btn-primary">volver</a>';
    };

    $product = Producto::getProductById($id);

    $marca = new Marca();
    $marcas = $marca -> todasMarcas();
?>

<h2>Editar producto</h2>
<form action="actions/edit_product_action.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="product_id" class="form-control" id="product_id" value="<?= $product->getIdProducto(); ?>" >
    <div class="mb-3">
        <label for="marca" class="form-label">Nombre del producto</label>
        <input type="text" class="form-control" id="producto" name="producto" value="<?= $product->getName(); ?>">
    </div>
    <div class="mb-3">
    <label for="marca" class="form-label">Marca</label>
    <select class="form-select" name="marca" id="marca">
        <?php foreach ($marcas as $marca): ?>
            <option value="<?= $marca->getIdMarca(); ?>" <?= $marca->getIdMarca() == $product->getIdMarca() ? 'selected' : '' ?>>
                <?= $marca->getMarca(); ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>
    <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <img class="img-thumbnail img-fluids" src="../../assets/products/<?= $product->getImg();?>" 
        alt="" style="max-width:200px">
        <input type="hidden" value="<?= $product->getImg()?>" name="imagen_or" class="form-control">
        <input class="form-control" type="file" id="foto" name="foto">
    </div>
    <input type="submit" class="btn btn-warning" value="Editar">
    <a href="?sec=productos" class="btn btn-danger">Cancelar</a>
</form>