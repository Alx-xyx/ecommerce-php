<?php
    require_once './classes/CatalogoProductos.php';

    function colorPorType($type){
        switch (strtolower($type)) {
            case 'ballpoint':
                return 'bg-success';
                break;
            case 'pen marker':
                return 'bg-success';
                break;
            case 'inkpen':
                return 'bg-success';
                break;
            case 'eraser':
                return 'bg-primary';
                break;
            case 'grid':
                return 'bg-danger';
                break;
            case 'ruled':
                return 'bg-danger';
                break;
            case 'blank':
                return 'bg-danger';
                break;
            default:
                return 'bg-secondary';
                break;
        }
    }

    $id = $_GET['id'] ?? null;

    if ($id) {
    $catalogo = new CatalogoProductos();
    $producto = $catalogo->getProductoPorId($id);


    if ($producto) {
        echo '<div class="container my-5 d-flex justify-content-center">';
            echo '<div class="card width24">';
                echo '<img src="assets/products/' . $producto->getImg() . '" class="card-img-top" alt="' . $producto->getName() . '">';
                echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $producto->getName() . '</h5>';
                    echo '<h6 class="card-subtitle mb-2 text-muted">' . $producto->getMarca() . '</h6>';

                    echo '<p class="card-text"><strong>Tamaño:</strong> ';
                    $sizes = explode(', ', $producto->getSize());
                    foreach ($sizes as $size) {
                        echo '<span class="badge bg-secondary me-1">' . $size . '</span>';
                    }
                    echo '</p>';

                    echo '<p class="card-text"><strong>Tipo:</strong> ';
                    $types = explode(', ', $producto->getType());
                    foreach ($types as $type) {
                        $colorClase = colorPorType($type);
                        echo '<span class="badge ' . $colorClase . ' text-dark me-1">' . $type . '</span>';
                    }
                    echo '</p>';

                    echo '<p class="card-text"><strong>Descripción:</strong> ' . $producto->getDescripcion() . '</p>';

                    echo '<a href="index.php?sec=products" class="btn btn-outline-primary">Volver al listado</a>';
                echo '</div>';
            echo '</div>'; 
        echo '</div>'; 
    } else {
        echo "<p>Producto no encontrado</p>";
        echo '<a href="index.php?sec=products" class="btn btn-outline-primary">Volver al listado</a>';
    }
    } else {
        echo "<p>ID no especificado</p>";
        echo '<a href="index.php?sec=products" class="btn btn-outline-primary">Volver al listado</a>';
    }
    
?>