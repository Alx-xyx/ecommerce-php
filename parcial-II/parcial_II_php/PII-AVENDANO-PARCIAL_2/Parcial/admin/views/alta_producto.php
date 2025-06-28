<?php
    require_once("../classes/Conexion.php");
    require_once("../classes/Producto.php");

    //* Llamo a Marca para manejar las marcas
    require_once("../classes/Marca.php");
    $marcas = new Marca;
    $lista = $marcas -> todasMarcas();

    //* Llamo a Coleccion para manejar las colecciones
    require_once("../classes/Coleccion.php");
    $colecciones = new Coleccion;
    $listaColection = $colecciones -> todasColecciones();

    //* Llamo a Size para manejar los tamaños
    require_once("../classes/Size.php");
    $tamaños = new Size;
    $listaTamaños = $tamaños -> todosTamaños();

    //* Llamo a Type para manejar los tipos 
    require_once("../classes/Tipo.php");
    $tipos = new Tipo;
    $listaTipos = $tipos -> todosTipos();
?>

    <h2>Agregado de productos</h2>
    <form action="actions/create_product_action.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre de Producto</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripcion</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion">
        </div>
            <div class="mb-3">
            <label for="img" class="form-label">Foto</label>
            <input class="form-control" type="file" id="img" name="img">
        </div>
        <div class="mb-3">
            <label for="brand" class="form-label">Marca</label>
            <select class="form-select" aria-label="Default select example" name="brand">
                <option selected>Seleccione una marca</option>
                <?php
                foreach ($lista as $marca) {
                ?>
                    <option value="<?=$marca->getIdMarca();?>"><?=$marca->getMarca();?></option>
                <?php
                }
                ?>
            </select>    
        </div>
        <div class="mb-3">
            <label for="collection" class="form-label">Coleccion</label>
            <select class="form-select" aria-label="Default select example" name="collection">                <option selected>Seleccione una coleccion</option>
                <?php
                foreach ($listaColection as $collection) {
                ?>
                    <option value="<?=$collection->getIdCollection();?>"><?=$collection->getCollection();?></option>
                <?php
                }
                ?>
            </select>    
        </div>
        <div class="mb-3">
            <label for="size" class="form-label">Tamaños</label>
            <select class="form-select" aria-label="Default select example" name="size[]" multiple>
                <option disabled selected value="">Seleccione un tamaño</option>
                <?php
                foreach ($listaTamaños as $size) {
                ?>
                    <option value="<?=$size->getIdSize();?>"><?=$size->getSize();?></option>
                <?php
                }
                ?>
            </select>    
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Tipos</label>
            <select class="form-select" aria-label="Default select example" name="type[]" multiple>
                <option disabled selected value="">Seleccione un tipo</option>
                <?php
                foreach ($listaTipos as $type) {
                ?>
                    <option value="<?=$type->getIdType();?>"><?=$type->getType();?></option>
                <?php
                }
                ?>
            </select>    
        </div>
        <input type="submit" value="Crear">
        <a href="?sec=productos" class="btn btn-danger">Cancelar</a>
    </form>
            <!-- <script>
        Swal.fire({
            icon: 'success',
            title: '¡Producto agregado!',
            text: 'El producto fue agregado exitosamente.',
            confirmButtonText: 'Aceptar'
        });
        </script> -->

        <!-- 
        
        /admin
            /actions
                create_product_action.php
            /classes
                Autenticacion.php
                Imagen.php
                Secciones.php
            /data
                sections.json
            /function
                autoload.php
            /includes
                body.php
                footer.php
                header.php
                head.php
                nav.php
            /views
                404.php
                alta_producto.php
                home.php
                inicio.php
                marcas.php
                productos.php
                tipos.php
                usuarios.php
            index.php
        -->