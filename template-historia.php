<?php
//Template Name: pagina de historia
get_header(); ?>

<main class="historia">
    <?php
        if(have_posts()){
            while(have_posts()){
                the_post(); ?>
                <?php
                global $post;
                $thumbID = get_post_thumbnail_id( $post->ID );
                $imgDestacada = wp_get_attachment_image_src( $thumbID, 'large' ); // Sustituir por thumbnail, medium, large o full
                $pathImgDestacada = $imgDestacada[0];
                ?>

                <article class="nosotros-contenedor">
                    <div class="nosotros-contenedor__titulo">
                        <h1 ><?php the_title();?></h1>
                    </div>
                    <div  class="nosotros-contenedor__imagen"  style="background-image:url( <?php echo $pathImgDestacada; ?> );">
                    </div>
                    <span class="barraUno" style="transform: "></span>
                    <span class="barraDos" style="transform: "></span>
                </article>


                <div class="historia-contenido">
                    <div class="historia-contenido__cuerpo">
                        <?php the_content(); ?>
                    </div>
                </div>


            <?php
            }
        }
    ?>
</main>

<script>
    const SkewedOne = document.querySelector('.barraUno');
const SkewedTwo = document.querySelector('.barraDos');
window.addEventListener('scroll', function () {
    const value1 = -15 + window.scrollY / 25;
    const value2 = 15 + window.scrollY / -25;
    SkewedOne.style.transform = "skewY(" + value1 + "deg)";
    SkewedTwo.style.transform = "skewY(" + value2 + "deg)";
})
</script>
<?php get_footer(); ?>

