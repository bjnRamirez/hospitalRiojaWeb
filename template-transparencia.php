<?php
//Template Name: Pagina Transparencia

get_header(); ?>

<div class="transparencia">
    <main class="seccion-transparencia">
        <div class="titulo-plantilla">
            <h1 class="titulo-principal"><?php the_title(); ?></h1>
        </div>

        <div class="contenedor-documento">
            <?php
            $args = array(
                'post_type' => 'documento',
                'posts_per_page' => -1,
                'order'         => 'ASC',
                'orderby'       => 'title',
            );
            $documentos = new WP_Query($args);
            if($documentos->have_posts()){
                while($documentos->have_posts()){
                    $documentos->the_post();  ?>
                    <?php $title = get_the_title();?>
                    <div class="contenedor-documento__card ">
                        <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" class="contenedor-documento__card-cuerpo">
                            <h3 class="contenedor-documento__card-titulo">
                                <?php the_title(); ?>
                            </h3>
                        </a>
                        <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
                        <figure>
                                <?php the_post_thumbnail('thumbnail', array( 'title' => $title, 'alt'   => $title, )) ?>
                        </figure>
                        </a>
                    </div>
                <?php
                }
            } ?>
        </div>
    </main>

    <hr class="separador">

    <section class='container py-5 busqueda'>
        <h2 class='my-3 text-center'>BUSQUEDA</h2>
        <?php
        if(have_posts()){
            while(have_posts()){
                the_post(); ?>
                <?php the_content(); ?>
            <?php
            }
        } ?>
    </section>
</div>
<?php get_footer(); ?>

