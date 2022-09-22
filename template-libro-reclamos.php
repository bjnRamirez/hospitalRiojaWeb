<?php
//Template Name: Pagina libro de reclamos

get_header(); ?>

<main class='reclamos'>
    <?php
    if(have_posts()){
        while(have_posts()){
            the_post(); ?>
            <h1 class='my-3 titulo-reclamos'><?php the_title();?></h1>
            <?php the_content(); ?>
        <?php
        }
    }   ?>
</main>

<?php get_footer(); ?>