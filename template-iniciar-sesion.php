<?php
//Template Name: pagina de inicar sesion
get_header(); ?>
<main class="iniciar-sesion">
    <div class="">
    <?php
    if(have_posts()){
        while(have_posts()){
            the_post(); ?>
                <div class="iniciar-sesion__formulario">
                    <article class="formulario-mensaje">
                        <figure class="logo">
                        <?php
                            if ( function_exists( 'the_custom_logo' ) ) {
                                the_custom_logo();
                            }
                        ?>
                        </figure>
                        <div>
                            <h1> Bienvenido</h1>
                            <p>(Solo personal autorizado)</p>
                        </div>
                    </article>
                    <article class="formulario-cuerpo">

                        <?php the_content(); ?>
                    </article>

                </div>
        <?php
        }
    } ?>
    </div>
</main>

<?php get_footer(); ?>

