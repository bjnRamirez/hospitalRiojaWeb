<?php
//Template Name: Pagina Contacto

get_header(); ?>

<main class="pagina-contacto">

    <div class='container'>
    <?php
    if(have_posts()){
        while(have_posts()){
            the_post(); ?>
            <div class="titulo-plantilla">
                <h1 class="titulo-principal"><?php the_title(); ?></h1>
            </div>
            <section class="contenedor-contacto">
                <article class="contenedor-contacto__formulario">
                    <?php echo do_shortcode('[contact-form-7 id="731" title="formulario_contacto"]'); ?>
                </article>
                <article class="contenedor-contacto__contactenos">
                    <div class="contactenos-bloque">
                        <?php the_content(); ?>
                    </div>
                </article>
            </section>
        <?php
        }
    }   ?>

        <section class="mapa">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7934.9808017416135!2d-77.17288745971669!3d-6.0644014228706125!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91b727c2168aa56b%3A0x3e113717aaeab4f9!2sHospital%20Rioja!5e0!3m2!1ses!2spe!4v1652967667303!5m2!1ses!2spe" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </section>
    </div>
</main>


<?php get_footer(); ?>