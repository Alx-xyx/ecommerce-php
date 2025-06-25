<main class="flex-grow-1">
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./assets/banner_pic_3.png" class="d-block w-100" alt="Foto de banner">
                <div class="carousel-caption d-none d-md-block text-dark">
                    <h1 class="usTitles">Contacto</h1>
                    <p class="usTexts">¿Tienes sugerencias, quejas o reseñas? Dejalas en el formulario de abajo!</p>
                </div>
            </div>
        </div>
    </div>
    <section class="container py-5">
        <form class="container" action="" method="get">
        <input type="hidden" name="sec" value="enviado" />
        <div class="mb-3">
            <label for="nombre" class="form-label">Tu nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Tu email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
        </div>
            <div class="mb-3">
            <label for="comentario" class="form-label">Tu comentario</label>
            <textarea class="form-control" id="comentario" rows="3" name="comentario"></textarea>
        </div>
            <input type="submit" value="Enviar" class="btn btn-primary mb-3">
        </form>
    </section>
</main>
<?php

require_once './includes/footerContacto.php'

?>
