<?php
    require_once './classes/CatalogoProductos.php';

?>

<main>
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./assets/banner_pic.png" class="d-block w-100" alt="Foto de banner">
                <div class="carousel-caption d-flex-column d-md-block text-dark">
                    <h1 class="usTitles">Bienvenido a productos</h1>
                    <p class="usTexts">Navega con el filtro para ver nuestros productos o visualiza todos los productos</p>
                </div>
            </div>
        </div>
    </div>
    <section class="sectionProducts">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link text-success" href="index.php?sec=products&cat=all">Quitar filtro</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-success" href="index.php?sec=products&cat=Notebooks">Cuadernos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-success" href="index.php?sec=products&cat=Pens">Lapiceras</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-success" href="index.php?sec=products&cat=Erasers">Gomas de borrar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-success" href="index.php?sec=products&cat=Pencil">Lapices</a>
            </li>
        </ul>
    </section>
    <?php
    
        $categoria = $_GET['cat'] ?? 'all';

        $catalogo = new CatalogoProductos();

        if ($categoria === 'all') {
            $productos = $catalogo->obtenerTodosLosProductos();
        } else {
            $productos = $catalogo->obtenerProductosPorCategoria($categoria);
        }

        if ($productos && is_array($productos)) {
            foreach ($productos as $producto) {
                $producto->cardRender();
            }
        } else {
            echo "<p>No hay productos para mostrar.</p>";
        }
    ?>
</main>