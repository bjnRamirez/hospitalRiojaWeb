<?php get_header(); ?>

<main class="pagina-principal">
    <div class=" boost">
        <?php
        if(have_posts()){
            while(have_posts()){
                the_post(); ?>
                <div class="pagina-principal__contenido">
                    <?php the_content(); ?>
                </div>
            <?php
            }
        } ?>
    </div>

    <section class="seccion-servicios">

            <h2 class='titulo-cartera-servicios animadoDerecha' id="seccion-servicios">Nuestra Cartera de Servicios de Salud</h2>
            <hr class="separador animadoArriba">
            <br>
            <div class="animadoArriba ">
            <div class="contenedor-unidad-servicios ">
                <h3 class="titulo-unidad-servicios" >Unidad Productora de Servicios de salud (UPSS)</h3>
                <?php
                $args = array(
                    'post_type' => 'servicio',
                    'posts_per_page' => -1,
                    'order'         => 'ASC',
                    'orderby'       => 'title',
                );
                ?>

                <div class="carousel ">
                    <div class="carousel__contenedor">
                        <button aria-label="Anterior" class="carousel__anterior">
                            <i class="fa fa-chevron-left"></i>
                        </button>
                        <div class="contenedor-servicio">
                            <div class="carousel__lista">
                            <?php
                            $servicios = new WP_Query($args);
                            if($servicios->have_posts()){
                                while($servicios->have_posts()){
                                    $servicios->the_post(); ?>
                                    <?php $title = get_the_title();?>
                                    <div class="contenedor-servicio__card">
                                        <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
                                            <div class="contenedor-servicio__card-inferior">
                                                <h4>
                                                    <?php the_title(); ?>
                                                </h4>
                                            </div>
                                        </a>
                                        <div class="contenedor-servicio__card-superior">
                                            <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
                                                <figure><?php the_post_thumbnail('large', array( 'title' => 'imagen destacada', 'alt'   => $title )) ?></figure>
                                            </a>
                                        </div>
                                    </div>
                                <?php
                                }
                            } ?>
                            </div>
                        </div>
                        <button aria-label="siguiente" class="carousel__siguiente">
                            <i class="fa fa-chevron-right"></i>
                        </button>
                    </div>
                    <div role="tablist" class="carousel__indicadores"></div>
                </div>
            </div>
            </div>
            <br>
            <div class="animadoArriba ">
            <div class="contenedor-actividad-servicio">
                <h3 class="titulo-actividad-servicio">Actividades de Salud</h3>
                <?php
                $args = array(
                    'post_type' => 'actividad',
                    'posts_per_page' => -1,
                    'order'         => 'ASC',
                    'orderby'       => 'title',
                );
                ?>

                <div class="carousel">
                    <div class="carousel__contenedor">
                        <button aria-label="Anterior" class="carousel__anterior-actividad">
                            <i class="fa fa-chevron-left"></i>
                        </button>
                        <div class="contenedor-servicio">
                            <div class="carousel__lista-actividad">
                            <?php
                            $servicios = new WP_Query($args);
                            if($servicios->have_posts()){
                                while($servicios->have_posts()){
                                    $servicios->the_post(); ?>
                                    <?php $title = get_the_title();?>
                                    <div class="contenedor-servicio__card-actividad">
                                        <div class="contenedor-servicio__card-superior-actividad">
                                            <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
                                                <figure><?php the_post_thumbnail('large', array( 'title' => 'imagen destacada', 'alt'   => $title )) ?></figure>
                                                </a>
                                        </div>
                                        <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
                                            <div class="contenedor-servicio__card-inferior-actividad">
                                                <h4>
                                                    <?php the_title(); ?>
                                                </h4>
                                            </div>
                                        </a>
                                    </div>
                                <?php
                                }
                            } ?>
                            </div>
                        </div>
                        <button aria-label="siguiente" class="carousel__siguiente-actividad">
                            <i class="fa fa-chevron-right"></i>
                        </button>
                    </div>
                    <div role="tablist" class="carousel__indicadores-actividad"></div>
                </div>
            </div>
            </div>
    </section>

    <section class="seccion-noticias " >
        <div class="container " > <!-- container -->
            <h2 class='titulo-noticia animadoDerecha' id="seccion-noticias">Noticias</h2>
            <hr class="separador animadoArriba">
            <br>
            <!-- <div class="animadoDerecha"> -->
            <div class="contenedor-noticia animadoArriba">
                <div class="row">
                <?php
                $args = array(
                    'post_type' => 'noticia',
                    'posts_per_page' => 1,
                    'order'         => 'DESC',
                    'orderby'       => 'date'
                );
                ?>
                <?php
                $argsSecundaria = array(
                    'post_type' => 'noticia',
                    'posts_per_page' => 4,
                    'offset' => 1,
                    'order'         => 'DESC',
                    'orderby'       => 'date',
                );
                ?>
                    <div class="contenedor-noticia__principal ">
                    <?php
                    $noticiasp = new WP_Query($args);
                    if($noticiasp->have_posts()){
                        while($noticiasp->have_posts()){
                        $noticiasp->the_post(); ?>
                        <?php $title = get_the_title();?>
                        <figure>
                            <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('large', array( 'title' => 'imagen destacada', 'alt'   => $title )) ?>
                            </a>
                        </figure>
                        <div class="contenedor-noticia__principal-contenido">
                            <h3>
                                <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h3>
                            <p class="fecha-principal">
                                <?php echo get_the_date(); ?>
                            </p>
                            <div class="adelanto">
                                <?php the_excerpt(); ?>
                            </div>
                            <a  href="<?php the_permalink(); ?>" class="boton__leermas">
                                <button class="leermas">
                                    <span class="shadow"></span>
                                    <span class="borde"></span>
                                    <span class="texto" >Seguir leyendo</span>
                                </button>
                            </a>
                        </div>
                        <?php
                        }
                    }   ?>
                    </div>

                    <aside class="contenedor-noticia__secundaria  ">
                        <div class="contenedor-noticia__secundaria-vertodo">
                            <p class="vertodo">
                                <a title="categoria noticias" href="<?php echo get_tag_link(6); ?>" > Ver Últimas Noticias <i class="fa fa-angle-right"></i></a>
                            </p>
                        </div>
                        <div class="contenedor-noticia__secundaria-elementos">
                        <?php
                        $noticiass = new WP_Query($argsSecundaria);
                        if($noticiass->have_posts()){
                            while($noticiass->have_posts()){
                            $noticiass->the_post(); ?>
                            <?php $title = get_the_title();?>
                            <div class="contenedor-noticia__secundaria-bloque">
                                <div class="contenedor-noticia__secundaria-cuerpo">
                                    <figure>
                                        <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail( array( 100, 100 ), array( 'title' => 'imagen destacada', 'alt'   => $title ) );  ?>
                                        </a>
                                    </figure>
                                    <div class="contenedor-noticia__secundaria-cuerpo_contenido ">
                                        <h3>
                                            <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
                                            <?php   the_title() ?>
                                            </a>
                                        </h3>
                                        <p class="fecha-secundaria">
                                            <?php echo get_the_date(); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                        } ?>
                        </div>
                    </aside>
                </div>
            </div>
            <!-- </div> -->
        </div>
    </section>


    <section class="seccion-documentos">
        <h2 class='text-center titulo-documentos animadoDerechaD'>Transparencia</h2>
        <hr class="separador">
        <br>
        <div class="contenedor-documento ">
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
                    $documentos->the_post(); ?>
                    <?php $title = get_the_title();?>
                    <div class="contenedor-documento__card animadoAbajo">
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
            }   ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>