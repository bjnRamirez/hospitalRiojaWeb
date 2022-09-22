jQuery(document).ready(function () {
    jQuery('#tabla').DataTable({
        order: [[0, 'desc']],
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Documentos",
            "infoEmpty": "Mostrando 0 a 0 de 0 Documentos",
            "infoFiltered": "(Filtrado de un total de _MAX_ documentos)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Documentos",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "No se encontro el Documento",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
        "scrollX": true,
        "createdRow": function(row, data, index){
            if (data[2] == 'resoluciones' || data[2] == 'RESOLUCIONES'){
                jQuery('td', row).eq(2).css({
                    'background-color': '#FFFFFF',
                    'color': '#000000',
                })
            } if (data[2] == 'convocatorias' || data[2] == 'CONVOCATORIAS'){
                jQuery('td', row).eq(2).css({

                    'background-color': '#FFFFFF',
                    'color': '#FF0000',

                })
            }if (data[2] == 'convenios' || data[2] == 'CONVENIOS'){
                jQuery('td', row).eq(2).css({
                    'background-color': '#000000',
                    'color': '#ffff',
                })

            }
        },
    });

});
