<?php get_header(); ?>

<main class='vista-estadistica'>
    <?php if(have_posts()){
        while(have_posts()){
            the_post(); ?>
            <div class="container">
            <button class="volver-atras" onclick="window.history.back();"><i class="fa fa-reply"></i>Regresar</button>
                <h1 class="vista-estadistica__titulo"><?php the_title() ?></h1>
                <hr class="separador">

                <div class="vista-estadistica__contenido">
                        <?php the_content(); ?>
                </div>
            </div>
        <?php
        }
    }   ?>
</main>
<?php get_footer(); ?>


