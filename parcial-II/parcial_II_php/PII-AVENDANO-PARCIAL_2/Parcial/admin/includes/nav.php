<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="?sec=home">Kanso</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?php echo $seccion =="home" ? 'active' : '' ?>" aria-current="page" href="index.php?sec=home">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Paneles de control de productos
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-item">
                            <a class="nav-link <?php echo $seccion =="productos" ? 'active' : '' ?>" aria-current="page" href="?sec=productos">Control de productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $seccion =="marcas" ? 'active' : '' ?>" aria-current="page" href="?sec=marcas">Control de marcas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $seccion =="tipos" ? 'active' : '' ?>" aria-current="page" href="?sec=tipos">Control de tipos</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Paneles de control de usuarios
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-item">
                            <a class="nav-link <?php echo $seccion =="productos" ? 'active' : '' ?>" aria-current="page" href="?sec=productos">Control de usuarios</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $seccion =="home" ? 'active' : '' ?>" aria-current="page" href="../index.php?sec=home">User</a>
                </li>
            </ul>
        </div>
    </div>
</nav>