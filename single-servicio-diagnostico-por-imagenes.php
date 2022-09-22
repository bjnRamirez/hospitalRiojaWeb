<?php get_header(); ?>

<div class="vista-servicio__contenedor">
    <main class="vista-servicio">
        <aside class="vista-servicio__secciones">
            <div>
                <p class="secciones__titulo">Secciones</p>
                <ul class="secciones__lista">
                    <li>
                        <div class="section-progress-indicator">
                            <a href="#atencion" class="section-progress-indicator__element">Atención</a>
                            <span class="section-progress-indicator__progress"></span>
                        </div>
                    </li>
                    <li>
                        <div class="section-progress-indicator">
                            <a href="#presentacion" class="section-progress-indicator__element">Presentación</a>
                            <span class="section-progress-indicator__progress"></span>
                        </div>
                    </li>
                    <li>
                        <div class="section-progress-indicator">
                            <a href="#objetivos" class="section-progress-indicator__element">Objetivos</a>
                            <span class="section-progress-indicator__progress"></span>
                        </div>
                    </li>
                    <li>
                        <div class="section-progress-indicator">
                            <a href="#prestaciones" class="section-progress-indicator__element">Prestaciones</a>
                            <span class="section-progress-indicator__progress"></span>
                        </div>
                    </li>
                    <li>
                        <div class="section-progress-indicator">
                            <a href="#profesionales" class="section-progress-indicator__element">Profesionales</a>
                            <span class="section-progress-indicator__progress"></span>
                        </div>
                    </li>
                    <li>
                        <div class="section-progress-indicator">
                            <a href="#galeria" class="section-progress-indicator__element">Galeria</a>
                            <span class="section-progress-indicator__progress"></span>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="servicio__regresar">
                <button class="volver-atras" onclick="volverAtras();"><i class="fa fa-reply"></i>Regresar</button>
            </div>
        </aside>
        <div class="vista-servicios__cuerpo">
        <?php
        if(have_posts()){
            while(have_posts()){
            the_post(); ?>
                <div class="vista-servicios__cuerpo-gradiente" >
                        <h1 class="text-center vista-servicios__cuerpo-titulo"><?php the_title() ?></h1>

                        <figure class="vista-servicios__cuerpo-imagen zoom">
                                <?php the_post_thumbnail('large', array( 'title' => 'imagen destacada' )); ?>
                        </figure>
                        <div class="compartir-servicio">
                        <p>Compartelo en</p>
                        <div class="compartir-botones-servicio">
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
                </div>
                <div class="vista-servicios__cuerpo-contenido">
                        <?php the_content(); ?>
                </div>
            <?php
            }
        }
            ?>
        </div>
    </main>
</div>
<?php get_footer(); ?>