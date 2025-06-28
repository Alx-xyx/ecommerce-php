<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="?sec=home">Kanso</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?php echo $seccion =="home" ? 'active' : '' ?>" aria-current="page" href="?sec=home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $seccion =="products" ? 'active' : '' ?>" aria-current="page" href="?sec=products">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $seccion =="us" ? 'active' : '' ?>" aria-current="page" href="?sec=us">Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $seccion =="contact" ? 'active' : '' ?>" aria-current="page" href="?sec=contact">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $seccion =="admin" ? 'active' : '' ?>" aria-current="page" href="admin">Admin</a>
                </li>
            </ul>
        </div>
    </div>
</nav>