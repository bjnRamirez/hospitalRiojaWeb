<?php get_header(); ?>

<section class="noticias">
    <div class="container">
        <div class="titulo-plantilla">
            <h1 class="titulo-principal">Noticias</h1>
        </div>

    <?php
    if(have_posts()){
        while(have_posts()){
        the_post(); ?>
            <div class="noticias__contenedor">
                <figure>
                    <?php the_post_thumbnail('medium', array( 'title' => 'imagen destacada' ), ['class' => 'img-responsive']); ?>
                </figure>
                <div class="noticias__contenedor-contenido ">
                    <h2>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h2>
                    <p class="noticias-fecha">
                        <?php echo get_the_date(); ?>
                    </p>
                    <div class="noticias-adelanto">
                        <?php the_excerpt(); ?>
                    </div>
                    <p  class="boton__leermas">
						<a href="<?php the_permalink(); ?>" >
                        	<button class="leermas">
                            	<span class="shadow"></span>
                            	<span class="borde"></span>
                            	<span class="texto" >Seguir leyendo </span>
                        	</button>
						</a>
                    </p>
                </div>
            </div>
        <?php
        }
    }
        ?>
        <?php
        the_posts_pagination(
            array(
                'prev_text' => __('« Anterior'),
                'next_text' => __(' Siguiente »'),
                'mid_size'  => 2,
                'class'     => 'navegacion-numerica-noticias'
            )
        );
        ?>
    </div>
</section>

<?php get_footer(); ?>