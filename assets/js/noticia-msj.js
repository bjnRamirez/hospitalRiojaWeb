( function( wp ) {
    wp.data.dispatch('core/notices').createNotice(
        'warning',
        'La noticia requiere un TITULO, CONTENIDO, IMAGEN DESTACADA y AUTOR (etiqueta), en caso contrario se guardara en el borrador',
        {
            isDismissible: true,
            __unstableHTML: true,
        }
    );

} )( window.wp );
