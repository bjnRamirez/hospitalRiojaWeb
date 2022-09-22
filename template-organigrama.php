<?php
//Template Name: Pagina organigrama

get_header(); ?>

<main class='organigrama'>
        <?php
        if(have_posts()){
            while(have_posts()){
                the_post(); ?>
                <div class="organigrama-contenido">
                <h1 class='titulo-organigrama'><?php the_title();?></h1>
                
                    <?php the_content(); ?>
                </div>
                
            <?php
            }
        }
        ?>
</main>

<?php get_footer(); ?>