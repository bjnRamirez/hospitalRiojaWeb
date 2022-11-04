<?php

add_action('after_setup_theme', 'init_template');
function init_template(){
// esto es un support para activar la imagen destacada y las etiquetas
    add_theme_support( 'post-thumbnails');
    add_theme_support( 'title-tag');
// esto es para la creacion del menu de navegacion
    register_nav_menus(
        array(
            'top_menu' => 'Menú principal',
        )
    );
// esto es un support para activar el logo
    $defaults = array(
        'height'               => 400,
        'width'                => 400,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array( 'site-title', 'site-description' ),
        'unlink-homepage-logo' => false,
    );
    add_theme_support( 'custom-logo', $defaults );
};

function ph_inicio(){
    if(!is_admin()){
        wp_enqueue_script('jquery');
    }
}
add_action( 'init', 'ph_inicio');

add_action('wp_enqueue_scripts', 'ph_assets');
function ph_assets(){
    //registro los estilos (framework - plugins)
    wp_register_style('bootstrap', get_template_directory_uri().'/assets/active/css/bootstrap.min.css','', '5.1.3', 'all');
    wp_register_style('glidercss', get_template_directory_uri().'/assets/active/css/glider.min.css','', '1.7.7', 'all');
    wp_register_style('dataTableTrapcss', get_template_directory_uri().'/assets/active/css/dataTables.bootstrap5.min.css','', '1.12.1', 'all');
    wp_register_style('lightbox', get_template_directory_uri().'/assets/active/css/lightbox.min.css','', '2.11.3', 'all');
    //iconos
    wp_register_style( 'FontAwesomeIcon', get_template_directory_uri().'/assets/fonts/style.css','','1.5','all' );

    //cargar el archivo menu.css menos en los servicios
    if(!is_singular( 'servicio' )){
        wp_enqueue_style('menu',get_template_directory_uri().'/assets/css/menu.css','', '1', '(min-width:1190px)');
    }
    //CARGO mis estilos con las dependencias antes registradas
    wp_enqueue_style('estilos',get_template_directory_uri().'/assets/css/estilos.css', array('bootstrap','glidercss', 'dataTableTrapcss','lightbox','FontAwesomeIcon'), '5.8.6','all');

    //scripts
    //no estoy usando todos los archivos de boostrap, solo lo ensencial
    wp_register_script('popper',get_template_directory_uri().'/assets/active/js/popper.min.js','','2.10.2',true);
    wp_enqueue_script('bootstrapjs',get_template_directory_uri().'/assets/active/js/bootstrap.min.js', array('jquery','popper'),'5.1.3',true);

    //lightbox - imagenGaleria
    wp_register_script('lightboxjs', get_template_directory_uri().'/assets/active/js/lightbox.js',array('jquery'),'2.11.4',true);
    wp_enqueue_script('lightboxmain', get_template_directory_uri().'/assets/js/lightbox.js',array('lightboxjs'),'2',true);

    // zoom - imagen
    wp_register_script('mediumZoom', get_template_directory_uri().'/assets/active/js/medium-zoom.min.js','','1.0.7',true);
    wp_enqueue_script('mediumzoommain', get_template_directory_uri().'/assets/js/medium-zoom.js',array('mediumZoom'),'1',true);


    //glider-carrusel servicios
    if ( is_front_page() ) {
    wp_enqueue_script( 'glider.min', get_template_directory_uri().'/assets/active/js/glider.min.js', '', '1.7.7', false );
    wp_enqueue_script('glider', get_template_directory_uri().'/assets/js/glider.js',array('glider.min'),'8',true);
    wp_enqueue_script('animar', get_template_directory_uri().'/assets/js/animar.js','','2',true);

    }
    //dataTables transparencia
    wp_register_script('dataTable.min', get_template_directory_uri().'/assets/active/js/jquery.dataTables.min.js','','1.12',true);
    wp_register_script('dataTableTrapjs', get_template_directory_uri().'/assets/active/js/dataTables.bootstrap5.min.js','','1.12',true);
    wp_enqueue_script('tabla', get_template_directory_uri().'/assets/js/tabla.js',array('jquery','dataTable.min','dataTableTrapjs'),'7',true);

    //main
    wp_enqueue_script('main', get_template_directory_uri().'/assets/js/main.js','','5.6.7',true);
}
// el plugin ultimate member, creaba codigo sin utilidad afectando el SEO, esto es para quitarlo
add_filter('plupload_default_settings', function ($settings) {
    if (defined('ALLOW_UNFILTERED_UPLOADS') && ALLOW_UNFILTERED_UPLOADS) {
        unset($settings['filters']['mime_types']);
    }

    return $settings;
});
/*
add_action('widgets_init', 'sidebar');
function sidebar(){
    register_sidebar(
        array(
            'name' => 'Pie de página',
            'id' => 'footer',
            'description' => 'Zona de Widgets para pie de página',
            'before_title' => '<p>',
            'after_title' => '</p>',
            'before_widget' => '<div id="%1$s" class="%2$s">',
            'after_widget' => '</div>',
        )
        );
};
*/

// Hook - iniciacion del widget y ejecucion de la funcion
add_action( 'widgets_init', 'add_Widget_Support' );
function add_widget_Support() {
    register_sidebar( array(
                    'name'          => 'Barra Lateral',
                    'id'            => 'sidebar',
                    'before_widget' => '<div>',
                    'after_widget'  => '</div>',
                    'before_title'  => '<h2>',
                    'after_title'   => '</h2>',
    ) );
}

//Creacion del custom post_type noticias
add_action('init', 'noticias_type');
function noticias_type(){
    $labels = array(
        'name'          => 'Noticias',
        'singular_name' => 'Noticia',
        'menu_name'     => 'Noticias',
        'search_items'  => 'Buscar Noticias',
        'add_new'       => 'Crear Noticia',
        'item_published' => 'Noticia publicada',
        'view_item'     => 'Ver Noticia',
        'add_new_item'  => 'Añadir Nueva Noticia',
        'edit_item'     => 'Editar Noticia',
        'item_updated'  => 'Noticia actualizada',
        'not_found'     => 'No se han encontrado noticias',
        'not_found_in_trash' => 'No se han encontrado noticias en la papelera',
        'item_reverted_to_draft' => 'Noticia convertida a borrador',

    );
    $args = array(
        'label'         => 'Noticias',
        'description'   => 'Noticias del Hospital',
        'labels'        => $labels,
        'supports'      => array('title', 'editor', 'thumbnail', 'revisions','author'),
        'taxonomies' => array( 'post_tag' ),
        'public'        => true,
        'show_in_menu'  => true,
        'menu_position' => 10,
        'menu_icon'     => 'dashicons-welcome-widgets-menus',
        'can_export'    => true,
        'publicly_queryable' => true,
        'rewrite'       =>true,
        'show_in_rest'  =>true,

    );
    register_post_type( 'noticia', $args );
}

//Creacion de taxonomia noticias
add_action('init', 'phRegisterTaxNoticia');
function phRegisterTaxNoticia(){
    $args = array(
        'hierarchical' => true,
        'labels' => array(
            'name' => 'Categorias de Noticias',
            'singular_name' => 'Categoria de Noticias',
        ),
        'show_in_nav_menu' => true,
        'show_admin_column' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'categoria-noticias'),
    );
    register_taxonomy( 'categoria-noticias', array('noticia'), $args);
}

/* Registra soporte para categorías al post type book*/
add_action( 'init', 'namespace_share_category_with_pages' );
function namespace_share_category_with_pages() {
    register_taxonomy_for_object_type( 'categoria-noticias', 'noticia' );
}


//Creacion del custom post_type documentos
add_action('init', 'documentos_type');
function documentos_type(){
    $labels = array(
        'name'          => 'Transparencia',
        'singular_name' => 'Documento',
        'menu_name'     => 'Transparencia',
        'search_items'  => 'Buscar Documentos',
        'add_new'       => 'Crear Documento',
        'item_published' => 'Documento publicado',
        'view_item'     => 'Ver Documento',
        'add_new_item'  => 'Añadir Nuevo Documento',
        'edit_item'     => 'Editar Documento',
        'item_updated'  => 'Documentos actualizados',
        'not_found'     => 'No se han encontrado Documentos',
        'not_found_in_trash' => 'No se han encontrado Documentos en la papelera',
    );
    $args = array(
        'label'         => 'Documentos',
        'description'   => 'Documentos del Hospital',
        'labels'        => $labels,
        'supports'      => array('title', 'editor', 'thumbnail', 'revisions'),
        'public'        => true,
        'show_in_menu'  => true,
        'menu_position' => 11,
        'menu_icon'     => 'dashicons-media-archive',
        'can_export'    => true,
        'publicly_queryable' => true,
        'rewrite'       =>true,
        'show_in_rest'  =>true
    );
    register_post_type( 'documento', $args );
}

//Creacion del custom post_type servicios
add_action('init', 'servicios_type');
function servicios_type(){
    $labels = array(
        'name'          => 'Servicios',
        'singular_name' => 'Servicio',
        'menu_name'     => 'Servicios',
        'search_items'  => 'Buscar Servicios',
        'add_new'       => 'Crear Servicio',
        'item_published' => 'Servicio publicado',
        'view_item'     => 'Ver Servicio',
        'add_new_item'  => 'Añadir Nuevo Servicio',
        'edit_item'     => 'Editar Servicio',
        'item_updated'  => 'Servicio actualizado',
        'not_found'     => 'No se han encontrado Servicios',
        'not_found_in_trash' => 'No se han encontrado Servicios en la papelera',
    );
    $args = array(
        'label'         => 'Servicios',
        'description'   => 'Servicios del Hospital',
        'labels'        => $labels,
        'supports'      => array('title', 'editor', 'thumbnail', 'revisions','author'),
        'public'        => true,
        'show_in_menu'  => true,
        'menu_position' => 12,
        'menu_icon'     => 'dashicons-buddicons-buddypress-logo',
        'can_export'    => true,
        'publicly_queryable' => true,
        'rewrite'       =>true,
        'show_in_rest'  =>true
    );
    register_post_type( 'servicio', $args );
}

//Creacion del custom post_type actividades-servicios
add_action('init', 'actividades_servicio_type');
function actividades_servicio_type(){
    $labels = array(
        'name'          => 'Actividades - servicio',
        'singular_name' => 'Actividad - servicio',
        'menu_name'     => 'Actividades - servicio',
        'search_items'  => 'Buscar Actividades - servicio',
        'add_new'       => 'Crear Actividad - servicio',
        'item_published' => 'Actividad - servicio publicada',
        'view_item'     => 'Ver Actividad - servicio',
        'add_new_item'  => 'Añadir Nueva Actividad - servicio',
        'edit_item'     => 'Editar Actividad - servicio',
        'item_updated'  => 'Actividad - servicio actualizado',
        'not_found'     => 'No se han encontrado Actividades - servicio',
        'not_found_in_trash' => 'No se han encontrado Actividades - servicio en la papelera',
    );
    $args = array(
        'label'         => 'Actividades - servicio',
        'description'   => 'Actividades de la cartera de servicios del Hospital',
        'labels'        => $labels,
        'supports'      => array('title', 'editor', 'thumbnail', 'revisions'),
        'public'        => true,
        'show_in_menu'  => true,
        'menu_position' => 13,
        'menu_icon'     => 'dashicons-text-page',
        'can_export'    => true,
        'publicly_queryable' => true,
        'rewrite'       =>true,
        'show_in_rest'  =>true
    );
    register_post_type( 'actividad', $args );
}


//Creacion del custom post_type estadistica
add_action('init', 'estadisticas_type');
function estadisticas_type(){
    $labels = array(
        'name'          => 'Estadisticas',
        'singular_name' => 'Estadistica',
        'menu_name'     => 'Estadistica',
        'search_items'  => 'Buscar estadistica',
        'add_new'       => 'Crear Estadistica',
        'item_published' => 'Estadistica publicada',
        'view_item'     => 'Ver Estadistica',
        'add_new_item'  => 'Añadir Nueva Estadistica',
        'edit_item'     => 'Editar Estadistica',
        'item_updated'  => 'Estadistica actualizada',
        'not_found'     => 'No se han encontrado Estadisticas',
        'not_found_in_trash' => 'No se han encontrado Estadisticas en la papelera',
    );
    $args = array(
        'label'         => 'Estadisticas',
        'description'   => 'Estadisticas del Hospital',
        'labels'        => $labels,
        'supports'      => array('title', 'editor', 'thumbnail', 'revisions'),
        'public'        => true,
        'show_in_menu'  => true,
        'menu_position' => 14,
        'menu_icon'     => 'dashicons-analytics',
        'can_export'    => true,
        'publicly_queryable' => true,
        'rewrite'       =>true,
        'show_in_rest'  =>true
    );
    register_post_type( 'estadistica', $args );
}



// TRANSPARENCIA TODOS LOS DOCUMENTOS
add_filter( 'the_content', 'busqueda_all' );
function busqueda_all( $content ) {
        $slug_page = 'transparencia'; //slug de la página en donde se mostrará la tabla
        $table_name = 'wp_posts'; // nombre de la tabla
        if (is_page($slug_page)){
            global $wpdb;
            $items = $wpdb->get_results(
                "SELECT * FROM `$table_name`
                where post_content in ('RESOLUCIONES', 'CONVENIOS', 'CONVOCATORIAS')
                and post_mime_type = 'application/pdf'
                and post_excerpt like '%-%' and post_excerpt != ''
                ");
            $result = '';

            // nombre de los campos de la tabla
            foreach ($items as $item) {
                $result .= '
                <tr class="fila-contenido align-middle ">
                    <td class="fila-contenido__fecha">'.$item->post_excerpt.'</td>
                    <td class="fila-contenido__nombre">'.$item->post_title.'</td>
                    <td class="fila-contenido__tipo">'.$item->post_content.'</td>
                    <td class="fila-contenido__ver enlace-normal" >
                    <a href="'.$item->guid.'" target="_blank" rel="noopener noreferrer">VER</a>
                    </td>

                    <td class="fila-contenido__ver enlace-movil">
                    <a href="https://docs.google.com/gview?url='.$item->guid.'&embedded=true" target="_blank" rel="noopener noreferrer">VER</a>
                    </td>

                    <td class="fila-contenido__descarga"><a href="'.$item->guid.'" target="_blank" rel="noopener noreferrer" download>Descarga</a></td>
                </tr>';
            }
            $template = '<table id="tabla" class="table-data table table-bordered table-hover" style="width:100%">
                            <thead>
                                <tr class="fila-titulo align-middle ">
                                    <th>Aprobado</th>
                                    <th>Titulo</th>
                                    <th>Tipo de Documento</th>
                                    <th class="enlace-normal">Enlace</th>
                                    <th class="enlace-movil">Enlace</th>
                                    <th>Descarga</th>
                                </tr>
                            </thead>
                            <tbody>{data}</tbody>
                        </table>';

            return $content.str_replace('{data}', $result, $template);
        }
        return $content;
}

//              RESOLUCIONES
add_filter( 'the_content', 'resoluciones' );
function resoluciones( $content ) {
    $slug_page = 'resoluciones'; //slug de la página en donde se mostrará la tabla
    $table_name = 'wp_posts'; // nombre de la tabla
    if (is_single($slug_page)){
        global $wpdb;
        $items = $wpdb->get_results(
            "SELECT * FROM `$table_name`
            where post_content = 'RESOLUCIONES'
            and post_mime_type = 'application/pdf'
            and post_excerpt like '%-%' and post_excerpt != ''
            ");
        $result = '';

        // nombre de los campos de la tabla
        foreach ($items as $item) {
                $result .= '<tr class="fila-contenido">
                    <td class="fila-contenido__fecha">'.$item->post_excerpt.'</td>
                    <td class="fila-contenido__nombre">'.$item->post_title.'</td>
                    <td class="fila-contenido__ver enlace-normal" >
                    <a href="'.$item->guid.'" target="_blank" rel="noopener noreferrer">VER</a>
                    </td>

                    <td class="fila-contenido__ver enlace-movil">
                    <a href="https://docs.google.com/gview?url='.$item->guid.'&embedded=true" target="_blank" rel="noopener noreferrer">VER</a>
                    </td>

                    <td class="fila-contenido__descarga"><a href="'.$item->guid.'" target="_blank" rel="noopener noreferrer" download>Descarga</a></td>
                </tr>';
            }
            $template = '<table id="tabla" class="table-data table table-bordered table-hover" style="width:100%">
                            <thead>
                                <tr class="fila-titulo">
                                    <th>Aprobado</th>
                                    <th>Titulo</th>
                                    <th class="enlace-normal">Enlace</th>
                                    <th class="enlace-movil">Enlace</th>
                                    <th>Descarga</th>
                                </tr>
                            </thead>
                            <tbody>{data}</tbody>
                        </table>';

        return $content.str_replace('{data}', $result, $template);
    }
    return $content;
}


//              CONVENIOS
add_filter( 'the_content', 'convenios' );
function convenios( $content ) {
    $slug_page = 'convenios'; //slug de la página en donde se mostrará la tabla
    $table_name = 'wp_posts'; // nombre de la tabla
    if (is_single($slug_page)){
        global $wpdb;
        $items = $wpdb->get_results(
            "SELECT * FROM `$table_name`
            where post_content = 'CONVENIOS'
            and post_mime_type = 'application/pdf'
            and post_excerpt like '%-%' and post_excerpt != ''
            ");
        $result = '';

        // nombre de los campos de la tabla
        foreach ($items as $item) {
            $result .= '<tr class="fila-contenido">
                <td class="fila-contenido__fecha">'.$item->post_excerpt.'</td>
                <td class="fila-contenido__nombre">'.$item->post_title.'</td>
                <td class="fila-contenido__ver enlace-normal" >
                <a href="'.$item->guid.'" target="_blank" rel="noopener noreferrer">VER</a>
                </td>

                <td class="fila-contenido__ver enlace-movil">
                <a href="https://docs.google.com/gview?url='.$item->guid.'&embedded=true" target="_blank" rel="noopener noreferrer">VER</a>
                </td>

                <td class="fila-contenido__descarga"><a href="'.$item->guid.'" target="_blank" rel="noopener noreferrer" download>Descarga</a></td>
            </tr>';
        }
        $template = '<table id="tabla" class="table-data table table-bordered table-hover" style="width:100%">
                        <thead>
                            <tr class="fila-titulo">
                                <th>Aprobado</th>
                                <th>Titulo</th>
                                <th class="enlace-normal">Enlace</th>
                                <th class="enlace-movil">Enlace</th>
                                <th>Descarga</th>
                            </tr>
                        </thead>
                        <tbody>{data}</tbody>
                    </table>';

        return $content.str_replace('{data}', $result, $template);
    }
    return $content;
}


//              CONVOCATORIAS
add_filter( 'the_content', 'convocatorias' );
function convocatorias( $content ) {
    $slug_page = 'convocatorias'; //slug de la página en donde se mostrará la tabla
    $table_name = 'wp_posts'; // nombre de la tabla
    if (is_single($slug_page)){
        global $wpdb;
        $items = $wpdb->get_results(
            "SELECT * FROM `$table_name`
            where post_content = 'CONVOCATORIAS'
            and post_mime_type = 'application/pdf'
            and post_excerpt like '%-%' and post_excerpt != ''
            ");
        $result = '';

        // nombre de los campos de la tabla
        foreach ($items as $item) {
            $result .= '<tr class="fila-contenido">
                <td class="fila-contenido__fecha">'.$item->post_excerpt.'</td>
                <td class="fila-contenido__nombre">'.$item->post_title.'</td>
                <td class="fila-contenido__ver enlace-normal" >
                <a href="'.$item->guid.'" target="_blank" rel="noopener noreferrer">VER</a>
                </td>

                <td class="fila-contenido__ver enlace-movil">
                <a href="https://docs.google.com/gview?url='.$item->guid.'&embedded=true" target="_blank" rel="noopener noreferrer">VER</a>
                </td>

                <td class="fila-contenido__descarga"><a href="'.$item->guid.'" target="_blank" rel="noopener noreferrer" download>Descarga</a></td>
            </tr>';
        }
        $template = '<table id="tabla" class="table-data table table-bordered table-hover" style="width:100%">
                        <thead>
                            <tr class="fila-titulo">
                                <th>Aprobado</th>
                                <th>Titulo</th>
                                <th class="enlace-normal">Enlace</th>
                                <th class="enlace-movil">Enlace</th>
                                <th>Descarga</th>
                            </tr>
                        </thead>
                        <tbody>{data}</tbody>
                    </table>';

        return $content.str_replace('{data}', $result, $template);
    }
    return $content;
}


// CAMPOS OBLIGATORIOS - NOTICIAS
add_action( 'save_post', 'comprobar_noticia' );
function comprobar_noticia( $post_id ) {
    // Elegimos los post types sobre los que actuar, en este caso: post
    if( 'noticia' != get_post_type( $post_id ) ) {
        return;
    }
    // Comprobamos que queremos publicar el post
    $post = get_post($post_id);

    if ('publish' == $post->post_status) {
        if ( !has_post_thumbnail( $post_id )  || !get_the_tags( $post_id )) {
            // Creamos un transient para mostrar un mensaje de error
            set_transient( "tiene_imagen_destacada_noticia", "no" );
            // Desactivamos el hook para evitar bucle infinito
            remove_action( 'save_post', 'comprobar_noticia' );
            // Guardamos la entrada como borrador
            wp_update_post( array( 'ID' => $post_id, 'post_status' => 'draft' ) );
            // Volvemos a activar el hook
            add_action( 'save_post', 'comprobar_noticia' );
        }else {
            delete_transient( "tiene_imagen_destacada_noticia" );
        }
    } if('publish' == $post->post_status) {
        if ( ! get_the_title( $post_id ) ) {
            // Creamos un transient para mostrar un mensaje de error
            set_transient( "tiene_titulo_noticia", "no" );
            // Desactivamos el hook para evitar bucle infinito
            remove_action( 'save_post', 'comprobar_noticia' );
            // Guardamos la entrada como borrador
            wp_update_post( array( 'ID' => $post_id, 'post_status' => 'draft' ) );
            // Volvemos a activar el hook
            add_action( 'save_post', 'comprobar_noticia' );
        }else {
            delete_transient( "tiene_titulo_noticia" );
        }
    } if('publish' == $post->post_status) {
        if ( ! has_blocks( $post_id ) ) {
            // Creamos un transient para mostrar un mensaje de error
            set_transient( "tiene_contenido_noticia", "no" );
            // Desactivamos el hook para evitar bucle infinito
            remove_action( 'save_post', 'comprobar_noticia' );
            // Guardamos la entrada como borrador
            wp_update_post( array( 'ID' => $post_id, 'post_status' => 'draft' ) );
            // Volvemos a activar el hook
            add_action( 'save_post', 'comprobar_noticia' );
        }else {
            delete_transient( "tiene_contenido_noticia" );
        }
    }
}
add_action( 'admin_notices', 'mostrar_mensaje_no_imagen' );
function mostrar_mensaje_no_imagen() {
    if ( "no" == get_transient( "tiene_imagen_destacada_noticia" ) ) {?>
        <div id="message" class="error">
            <p><strong>La noticia requiere una IMAGEN DESTACADA y AUTOR (etiqueta). Añadelo antes de publicar</strong></p>
        </div>

        <?php delete_transient( "tiene_imagen_destacada_noticia" );
    }
}
add_action( 'admin_notices', 'mostrar_mensaje_no_titulo' );
function mostrar_mensaje_no_titulo() {
    if ( "no" == get_transient( "tiene_titulo_noticia" ) ) {?>
        <div id="message" class="error">
            <p><strong>La noticia no tiene TITULO. Añadelo antes de publicar</strong></p>
        </div>

        <?php delete_transient( "tiene_titulo_noticia" );
    }
}

add_action( 'admin_notices', 'mostrar_mensaje_no_contenido' );
function mostrar_mensaje_no_contenido() {
    if ( "no" == get_transient( "tiene_contenido_noticia" ) ) {?>
        <div id="message" class="error">
            <p><strong>La noticia no tiene CONTENIDO. Añadelo antes de publicar</strong></p>
        </div>

        <?php delete_transient( "tiene_contenido_noticia" );
    }
}

//mensaje para el custom post type documento
add_action( 'enqueue_block_editor_assets', 'ph_enqueue_mensaje_documento' );
function ph_enqueue_mensaje_documento() {

    $screen = get_current_screen();
    if ($screen->id  == 'documento'){
        wp_enqueue_script(
            'script-notice-blocks',
            get_stylesheet_directory_uri().'/assets/js/documento-msj.js',
            array(),
            "1.1",
            true
        );
    }
}
//mensaje para la creacion de una noticia
add_action( 'enqueue_block_editor_assets', 'ph_enqueue_mensaje_noticia' );
function ph_enqueue_mensaje_noticia() {

    $screen = get_current_screen();
    if ($screen->id  == 'noticia'){
        wp_enqueue_script(
            'script-notice-blocks',
            get_stylesheet_directory_uri().'/assets/js/noticia-msj.js',
            array(),
            "1.0",
            true
        );
    }
}

add_filter( 'excerpt_length', 'phexcerpt');
function phexcerpt( $length ){
	// length es de 60 palabras
    if(is_tax()){
        return 30;
    } else{
        return 60;
    }
}

//creacion del formulario de registro
function registration_form( $username, $password, $email, $first_name, $last_name) {

    echo '
    <div class="signin">
        <div class="signin__container">
            <form class="signin__form" action="' . $_SERVER['REQUEST_URI'] . '" method="post" enctype="multipart/form-data" id="formul" >

                <div class="signin__name name--campo">
                    <label for="username">Nombre de usuario <strong>*</strong></label>
                    <input id="username" class="form-control" type="text" name="username" value="' . ( isset( $_POST['username'] ) ? $username : null ) . '">
                </div>

                <div class="signin__name name--campo">
                    <label for="password">Contraseña <strong>*</strong></label>
                    <input id="password" class="form-control" type="password" name="password" value="' . ( isset( $_POST['password'] ) ? $password : null ) . '">
                </div>

                <div class="signin__email name--campo">
                    <label for="email">Email <strong>*</strong></label>
                    <input id="email" class="form-control" type="text" name="email" value="' . ( isset( $_POST['email']) ? $email : null ) . '">
                </div>

                <div class="signin__name name--campo">
                    <label for="firstname">Nombres</label>
                    <input id="firstname" class="form-control" type="text" name="fname" value="' . ( isset( $_POST['fname']) ? $first_name : null ) . '">
                </div>

                <div class="signin__name name--campo">
                    <label for="lastname">Apellidos</label>
                    <input id="lastname" class="form-control" type="text" name="lname" value="' . ( isset( $_POST['lname']) ? $last_name : null ) . '">
                </div>


        <input class="btn btn-primary mb-2"  type="submit"  name="submit" value="Registrar" />
            </form>
        </div>
    </div>
    ';

    }

    function registration_validation( $username, $password, $email, $first_name, $last_name) {
        global $reg_errors;
        $reg_errors = new WP_Error;

        if ( empty( $username ) || empty( $password ) || empty( $email )) {
            $reg_errors->add('field', 'El campo (*) es obligatorio');
        }
        if ( 4 > strlen( $username ) ) {
            $reg_errors->add( 'username_length', 'El nombre de usuario demasiado corto. Se requieren al menos 4 caracteres' );
        }

        if ( username_exists( $username ) )
            $reg_errors->add('user_name', '¡Lo sentimos, ese nombre de usuario ya existe!');

        if ( ! validate_username( $username ) ) {
            $reg_errors->add( 'username_invalid', 'Lo sentimos, el nombre de usuario que ingresó no es válido' );
        }

        if ( 5 > strlen( $password ) ) {
            $reg_errors->add( 'password', 'La longitud de la contraseña debe ser superior a 5' );
        }

        if ( !is_email( $email ) ) {
            $reg_errors->add( 'email_invalid', 'El correo no es valido' );
        }

        if ( email_exists( $email ) ) {
            $reg_errors->add( 'email', '¡Lo sentimos, el correo ya esta en uso' );
        }

        if ( is_wp_error( $reg_errors ) ) {
            echo '<div id="error" class="error-registro container">';
        foreach ( $reg_errors->get_error_messages() as $error ) {
            echo '<p><strong>ERROR</strong>:';
            echo $error . '</p>';
            }
            echo '</div>';
        }
    }

    function complete_registration() {
        global $reg_errors, $username, $password, $email, $first_name, $last_name;
        if ( count( $reg_errors->get_error_messages() ) < 1 ) {
            $userdata = array(
                'user_login' => $username,
                'user_email' => $email,
                'user_pass' => $password,
                'first_name' => $first_name,
                'last_name' => $last_name,

        );
            $user = wp_insert_user( $userdata );
            echo '<div id="exito" class="exito-registro container">';
            echo '<p><strong>Registro exitoso</strong></p>';
            echo '</div>';
        }
    }
    function custom_registration_function() {
        if ( isset($_POST['submit'] ) ) {
                registration_validation(
                $_POST['username'],
                $_POST['password'],
                $_POST['email'],
                $_POST['fname'],
                $_POST['lname'],


            );
        // sanitize user form input
            global $username, $password, $email, $first_name, $last_name;
            $username = sanitize_user( $_POST['username'] );
            $password = esc_attr( $_POST['password'] );
            $email = sanitize_email( $_POST['email'] );
            $first_name = sanitize_text_field( $_POST['fname'] );
            $last_name = sanitize_text_field( $_POST['lname'] );

        // call @function complete_registration to create the user
        // only when no WP_error is found
            complete_registration(
                $username,
                $password,
                $email,
                $first_name,
                $last_name
            );
        }
        registration_form(
            $username,
            $password,
            $email,
            $first_name,
            $last_name
        );

    }
     // Register a new shortcode: [cr_custom_registration]
add_shortcode( 'ph_registro-usuario', 'custom_registration_user' );
// The callback function that will replace [book]
function custom_registration_user() {
ob_start();
custom_registration_function();
return ob_get_clean();

}

add_action("template_redirect", function(){
    if( ! um_is_core_page("user") ){
        remove_action( 'wp_footer', array( UM()->modal(), 'load_modal_content' ), 9 );
    }
});

function excerpt($num) {
    $limit = $num+1;
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt)."...";
    echo $excerpt;
    }
    function content($num) {
    $theContent = get_the_content();
    $output = preg_replace('/<img&#91;^>]+./','', $theContent);
    $limit = $num+1;
    $content = explode(' ', $output, $limit);
    array_pop($content);
    $content = implode(" ",$content)."...";
    echo $content;
    }
