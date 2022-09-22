
        new Glider(document.querySelector('.carousel__lista'), {
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: '.carousel__indicadores',
            draggable: true,
            arrows: {
                prev: '.carousel__anterior',
                next: '.carousel__siguiente'
            },
            responsive: [
                {
                  // screens greater than >= 570px
                breakpoint: 600,
                settings: {
                    // Set to `auto` and provide item width to adjust to viewport
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    duration: 1
                }
                },{
                  // screens greater than >= 860px
                breakpoint: 900,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    duration: 1
                }
                },{
                    // screens greater than >= 1200px
                breakpoint: 1200,
                settings: {
                slidesToShow: 4,
                slidesToScroll: 2,
                duration: 1
                }
                },{
                    // screens greater than >= 1200px
                breakpoint: 1500,
                settings: {
                slidesToShow: 5,
                slidesToScroll: 3,
                duration: 1
                }
                }
            ]
        } );

                //GLIDER-ACTIVIDAD
        new Glider(document.querySelector('.carousel__lista-actividad'), {
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: '.carousel__indicadores-actividad',
            draggable: true,
            arrows: {
                prev: '.carousel__anterior-actividad',
                next: '.carousel__siguiente-actividad'
            },
            responsive: [
                {
                  // screens greater than >= 570px
                breakpoint: 600,
                settings: {
                    // Set to `auto` and provide item width to adjust to viewport
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    duration: 1
                }
                },{
                    // screens greater than >= 860px
                breakpoint: 900,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    duration: 1
                }
                },{
                      // screens greater than >= 1200px
                breakpoint: 1500,
                settings: {
                slidesToShow: 3,
                slidesToScroll: 2,
                duration: 1
                }
                }
            ]
        } );

