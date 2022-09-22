<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo("charset") ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title and meta description -->
    <!-- < ?php the_title( '<title>', '</title>' ); ?> -->
    <meta name="description" content="<?php if ( is_front_page() ) {
        echo "El Hospital II-1 Rioja, saluda cordialmente a toda la población y les recuerda que estamos trabajando para cuidar y salvar tu vida y la de tu familia.";
    } else  {
        echo excerpt('35');
    }  ?>"/>

    <!-- Open Graph meta tags -->
    <meta property="og:locale" content="<?php echo get_locale(); ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php the_title(); ?>" />
    <?php if ( get_the_excerpt() ) : ?>
    <meta property="og:description" content="<?php if ( is_front_page() ) {
        echo "El Hospital II-1 Rioja, saluda cordialmente a toda la población y les recuerda que estamos trabajando para cuidar y salvar tu vida y la de tu familia.";
    } else  {
        echo excerpt('35');
    }  ?>"/>
    <?php endif; ?>
    <meta property="og:url" content="<?php echo ( isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http' ) . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" />
    <meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>" />
    <?php if ( get_the_post_thumbnail() ) :
    $image_data_wh = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
    ?>
    <meta property="og:image:width" content="<?php echo $image_data_wh[1]; ?>" />
    <meta property="og:image:height" content="<?php echo $image_data_wh[2]; ?>" />
    <meta property="og:image" content="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>" />
    <meta property="og:image:secure_url" content="<?php echo str_replace( 'http://', 'https://', get_the_post_thumbnail_url( get_the_ID(), 'large' ) ); ?>" />
    <?php endif; ?>

    <!-- Twitter Card meta tags -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@HR_II1_Oficial" />
	<meta name="twitter:creator" content="@HR_II1_Oficial" />
    <meta name="twitter:title" content="<?php the_title(); ?>" />
    <?php if ( get_the_excerpt() ) : ?>
    <meta name="twitter:description" content="<?php if ( is_front_page() ) {
        echo "El Hospital II-1 Rioja, saluda cordialmente a toda la población y les recuerda que estamos trabajando para cuidar y salvar tu vida y la de tu familia.";
    } else  {
        echo excerpt('35');
    }  ?>"/>
    <?php endif; ?>
    <?php if ( get_the_post_thumbnail() ) : ?>
    <meta name="twitter:image" content="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>" />

    <?php endif; ?>
    <?php wp_head()?>
</head>


<body>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v14.0" nonce="eHYcZa2X"></script>

    <header class="mantener-posicion-menu">
        <div class="menu-top" ><!--flex -->
            <figure class="logo">
                <?php
                if ( function_exists( 'the_custom_logo' ) ) {
                    the_custom_logo();
                }
                ?>
            </figure>
            <p class="texto-bienvenida">BIENVENIDOS AL HOSPITAL II-1 RIOJA</p>
            <figure class="portal">
                <a title="portal"  href="#" target="_blank" rel="noopener noreferrer">
                    <img width="130" height="52" src="<?php echo get_template_directory_uri() ?>/assets/img/portal.png" alt="portal">
                </a>
            </figure>
        </div>

        <div class="contenedor-menu">  <!--flex -->
                <!-- <span class="nav-bar" id="btnMenu"><i class="fa-solid fa-bars"></i></span> -->
            <div class="hamburger" id="btnMenu">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </div>
            <nav class="main-nav">
                <?php wp_nav_menu(
                    array(
                        'theme_location' => 'top_menu',
                        'menu_class'    => 'menu',
                        'container'  => '',
                        'menu_id' => 'menu',
                    )
                );
                ?>
            </nav>
        </div>
    </header>

    <div class="contenedor-bar">
        <input type="checkbox" id="btn-social">
        <label for="btn-social" class="fa fa-play"> </label>
        <div class="icon-social">
            <a title="facebook" href="https://facebook.com/HospitalRioja.II1" target="_blank" rel="noopener noreferrer" class="fa fa-facebook-f"  >
                <span class="title">Facebook</span>
            </a>
            <a title="instagram" href="https://www.instagram.com/hospitalii1rioja/" target="_blank" rel="noopener noreferrer" class="fa fa-instagram" >
                <span class="title">Instagram</span>
            </a>
            <a title="twitter" href="https://twitter.com/HR_II1_Oficial" target="_blank" rel="noopener noreferrer" class="fa fa-twitter" >
                <span class="title">Twitter</span>
            </a>
            <a title="youtube" href="https://www.youtube.com/channel/UC-a54YAwiMvW1aEXJeL5qIQ" target="_blank" rel="noopener noreferrer" class="fa fa-youtube-play" >
                <span class="title">Youtube</span>
            </a>
            <a title="tiktok" href="https://www.tiktok.com/@hospitalrioja_oficial" target="_blank" rel="noopener noreferrer" class="fa fa-tiktok" >
                <i class="fa fa-tiktok"></i>
                <i class="fa fa-tiktok"></i>
                <span class="title">Tiktok</span>
            </a>
        </div>
    </div>

    <span class="boton-subir">
        <i class="fa fa-chevron-up" ></i>
    </span>