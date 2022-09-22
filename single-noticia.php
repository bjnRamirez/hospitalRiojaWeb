<?php get_header(); ?>

<main class="vista-noticia">
    <div class="vista-noticia__vista">
        <?php if(have_posts()){ ?>
        <?php while(have_posts()){ ?>
            <?php  the_post(); ?>
            <div class="vista-noticia__titulo">
                <h1><?php the_title() ?></h1>
            </div>
            <div class="vista-noticia__cuerpo">
                <main class="vista-noticia__bloque">
                    <div>
                        <figure class="vista-noticia__imagen zoom">
                            <?php the_post_thumbnail('large', array( 'title' => 'imagen destacada' )); ?>
                        </figure>
                        <div class="vista-noticia__contenido">
                            <p class="fecha-noticia">
                                <?php echo get_the_date(); ?>
                            </p>

                            <div class="compartir">
                                <p>Comparte:</p>
                                <div class="compartir-botones">
                                    <div class="fb-share-button"
                                        data-href="<?php echo ( isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http' ) . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>"
                                        data-layout="button_count"data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore"></a>
                                    </div>

                                    <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-size="large" data-show-count="false"></a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

                                    <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                        <div class="compartir__enlaces">
                                            <a target="_blank" class="a2a_button_whatsapp" ></a>
                                            <a class="a2a_button_copy_link"></a>
                                        </div>
                                    </div>
                                    <script async src="https://static.addtoany.com/menu/page.js"></script>
                                </div>
                            </div>
                            <div class="vista-noticia__contenido-autor">
                                <?php echo get_the_tag_list();  ?>
                            </div>
                            <div class="contenido-noticia">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                </main>
            <?php
        }
    } ?>
                    <aside class="vista-noticia__masNoticia">
                    <!-- Otras noticias-->
                    <?php
                    $ID_noticia_actual = get_the_ID();
                    //Generamos un loop personalizado y definimos args
                    $args = array(
                        'post_type' => 'noticia',
                        'posts_per_page' => 3,
                        'order' => 'DESC',
                        'orderby'       => 'date',
                        'post__not_in'  => array($ID_noticia_actual),

                    );
                    $noticias = new WP_Query($args);
                    ?>
                    <!-- Ejecutar el loop con el objeto $noticias -->
                    <?php if($noticias->have_posts()) { ?>
                        <div class="vista-noticia__masNoticia-titulo">
                            <h2 class="masNoticia-titulo">Te puede interesar</h2>
                        </div>
                        <div class="vista-noticia__masNoticia-elementos">
                        <?php while($noticias->have_posts()) {
                            $noticias->the_post(); ?>
                            <div class="vista-noticia__masNoticia-bloque">
                                <div class="vista-noticia__masNoticia-cuerpo">
                                    <figure class="vista-noticia__masNoticia-cuerpo_imagen">
                                        <a href="<?php the_permalink() ?>">
                                            <?php the_post_thumbnail( array( 100, 100 ), array( 'title' => 'imagen destacada' ) );  ?>
                                        </a>
                                    </figure>
                                    <div class="vista-noticia__masNoticia-cuerpo_contenido ">
                                        <h3>
                                            <a href="<?php the_permalink() ?>">
                                                <?php the_title(); ?>
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                            <div class="contenedor-noticia__secundaria-vertodo">
                                <p class="vertodo">
                                    <a title="categoria noticias" href="<?php echo get_tag_link(6); ?>"> Ver Últimas Noticias <i class="fa fa-angle-right"></i> </a>
                                </p>
                            </div>
                        </div>
                    <?php } ?>
                    </aside>
                </div>
    </div>
</main>

<?php get_footer(); ?>

