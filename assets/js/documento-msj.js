( function( wp ) {
	wp.data.dispatch('core/notices').createNotice(
		'warning',
        'INSTRUCCIONES: <br/> 1.- Subir un documento (PDF) en la seccion medios .<br/> 2.- Hacer clic en el documento. <br/> 3.- En la leyenda se debe agregar una fecha con el siguiente formato (año-mes-dia)<br/> 4.- En la descripcion se debe agregar el tipo de documento (RESOLUCIONES, CONVOCATORIAS, ...)',
		{
			isDismissible: true,
            __unstableHTML: true,
            actions: [
				{
					url: 'https://hospitalrioja.gob.pe/wp-admin/upload.php',
					label: 'Ir a MEDIOS'
				}
			]
		}
	);

	wp.data.dispatch('core/notices').createNotice(
		'error',
        'NO se sube el documento aqui.<br/>Esta entrada solo es para la creacion de la interfaz en la pagina web.<br/>El documento se sube en la seccion de medios del panel administrativo de WordPress.',
		{
			isDismissible: true,
            __unstableHTML: true,
		}
	);

} )( window.wp );