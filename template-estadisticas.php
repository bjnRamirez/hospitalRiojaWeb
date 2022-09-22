<?php
//Template Name: Pagina de estadisticas

get_header(); ?>

<main class="seccion-estadistica">
    <?php
    if(have_posts()){
        while(have_posts()){
            the_post(); ?>
            <div class="container">
                <div class="titulo-plantilla">
                    <h1 class="titulo-principal"><?php the_title(); ?></h1>
                </div>
                <div class="my-2">
                    <?php the_content(); ?>
                </div>
            </div>

        <?php
        }
    }   ?>

    <br>

    <div class="contenedor-estadistica container">
        <?php
        $args = array(
            'post_type' => 'estadistica',
            'posts_per_page' => -1,
            'order'         => 'ASC',
            'orderby'       => 'title',
        );

        $estadistica = new WP_Query($args);
        if($estadistica->have_posts()){
            while($estadistica->have_posts()){
                $estadistica->the_post();
                ?>
                <div class="contenedor-estadistica__card">
                    <figure>
                        <?php the_post_thumbnail('thumbnail') ?>
                    </figure>
                    <div class="estadistica__card-cuerpo">
                        <h2>
                            <?php the_title(); ?>
                        </h2>
                        <p>
                            <a href="<?php the_permalink(); ?>">Ver</a>
                        </p>
                    </div>
                </div>
            <?php
            }
        }   ?>
    </div>
</main>

<?php get_footer(); ?>