<?php get_header(); ?>

<main class="vista-actividad">
    <?php
    if(have_posts()){
        while(have_posts()){
            the_post(); ?>
            <div class="vista-actividad__contenedor">
                <div class="vista-actividad__superior">
                    <h1 ><?php the_title() ?> </h1>
                    <figure>
                        <?php the_post_thumbnail(array( 400, 400 ), array( 'title' => 'imagen destacada' )); ?>
                    </figure>
                </div>
                <div class="vista-actividad__inferior">
                    <?php the_content(); ?>
                </div>
            </div>
        <?php
        }
    }   ?>
</main>

<?php get_footer(); ?>