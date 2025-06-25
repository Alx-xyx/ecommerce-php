<?php

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

    include_once './data/productsArray.php';

    $id = $_GET['id'] ?? null;
    $productoSeleccionado = null;

    foreach ($productos as $producto) {
        if ($producto['id'] == $id) {
            $productoSeleccionado = $producto;
            break;
        }
    };

    if ($productoSeleccionado) {
        echo '<div class="container my-5 d-flex justify-content-center">';
            echo '<div class="card width24">';
                echo '<img src="' . $productoSeleccionado['img'] . '" class="card-img-top" alt="' . $productoSeleccionado['name'] . '">';
                    echo '<div class="card-body">';
                        echo '<h5 class="card-title">' . $productoSeleccionado['name'] . '</h5>';
                        echo '<h6 class="card-subtitle mb-2 text-muted">' . $productoSeleccionado['brand'] . '</h6>';
                        echo '<p class="card-text"><strong>Tamaño:</strong> ';
                        if (is_array($productoSeleccionado['size'])) {
                            foreach ($productoSeleccionado['size'] as $size) {
                                echo '<span class="badge bg-secondary me-1">' . $size . '</span>';
                            }
                        } else {
                            echo '<span class="badge bg-secondary me-1">' . $productoSeleccionado['size'] . '</span>';
                        }
                        echo '</p>';
                        echo '<p class="card-text"><strong>Tipo:</strong> ';
                        if (is_array($productoSeleccionado['type'])) {
                            foreach ($productoSeleccionado['type'] as $type) {
                                $colorClase = colorPorType($type);
                                echo '<span class="badge ' . $colorClase . ' text-dark me-1">' . $type . '</span>';
                            }
                        } else {
                            echo '<span class="badge bg-info text-dark me-1">' . $productoSeleccionado['type'] . '</span>';
                        }
                        echo '</p>';
                        echo '<p class="card-text"><strong>Descripción:</strong>';
                        if (isset($productoSeleccionado['desc'])) {
                            echo '<p class="card-text">' . $productoSeleccionado['desc'] . '</p>';
                        } else{
                            echo '<p class="card-text">Sin descripcion</p>';
                        }
                        echo '</p>';
                    echo '<a href="index.php?sec=products" class="btn btn-outline-primary">Volver al listado</a>';
                echo '</div>';
            echo '</div>'; 
        echo '</div>'; 
    } else {
        echo "<p>Producto no encontrado</p>";
        echo '<a href="index.php?sec=products" class="btn btn-outline-primary">Volver al listado</a>';
    }

?>