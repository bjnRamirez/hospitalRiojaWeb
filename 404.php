<div class="ocultar">
<?php   get_header();      ?>
</div>

<section class="page_404">
    <div class="scene">
        <img src="<?php echo get_template_directory_uri() ?>/assets/img/stars.png" class="stars">
        <img src="<?php echo get_template_directory_uri() ?>/assets/img/space_ship.png" class="ship">
        <img src="<?php echo get_template_directory_uri() ?>/assets/img/astronaut.png" class="astronaut">
        <img src="<?php echo get_template_directory_uri() ?>/assets/img/comet.png" class="comet">
        <img src="<?php echo get_template_directory_uri() ?>/assets/img/moon.png" class="moon">

        <div class="contenido">
            <h1 class="text-center ">Error 404</h1>
            <div class="contant_box_404 error-404">
                <h2>Parece que estas perdido</h2>
                <h3>Página no Encontrada</h3>
                <a href="<?php echo home_url(); ?>" class="link_404">Regresar a la pagina principal</a>
            </div>
        </div>
    </div>
</section>

<div class="ocultar">
<?php get_footer(); ?>
</div>