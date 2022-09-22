<?php get_header(); ?>

<main class='container my-3'>
    <?php if(have_posts()){
        while(have_posts()){
            the_post(); ?>
            <h1 class="text-center"><?php the_title() ?> </h1>
            <div class="row my-5 vista-documento">
                <?php the_content(); ?>
            </div>
        <?php
        }
    }   ?>
</main>

<?php get_footer(); ?>

