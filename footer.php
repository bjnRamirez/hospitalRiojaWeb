<footer >
    <div class="container">
        <div class="pie-pagina">
            <!-- < ?php dynamic_sidebar('footer'); ?>
            <p>
            Copyright <br>
            ©2022 Hospital todos los derechos reservados
            </p> -->
            <figure class="footer-primero__logo">
                <?php
                    if ( function_exists( 'the_custom_logo' ) ) {
                        the_custom_logo();
                    }
                ?>
            </figure>
            <div class="footer-segundo">
                <p class="footer-info-titulo">Horario de atención:</p>
                <div class="atencion">
                    <p><i class="fa fa-calendar-check-o"></i>Administrativo:</p>
                    <p> Lunes a Sábado: de 7 am a 1pm</p>
                </div>
                <div class="atencion">
                    <p><i class="fa fa-calendar"></i>Emergencias Médicas:</p>
                    <p> Lunes a Domingo: las 24 horas</p>
                </div>
                <p class="footer-info-titulo">Dirección:</p>
                <p><i class="fa fa-map-marker"></i> Jr. Venecia C-6 Sector-Atahualpa</p>

                <p class="footer-info-titulo">Central Telefónica: </p>
                <p><i class="fa fa-phone"></i> (042) 55 95 10</p>
            </div>
            <div class="footer-tercero">
                <p class="footer-info-titulo">Síguenos:</p>
                <div class="footer-red-social">
                    <a title="facebook"  href="https://www.facebook.com/HospitalRioja.II1" target="_blank" rel="noopener noreferrer"  class="fa fa-facebook-f" ></a>
                    <a title="instagram" href="https://www.instagram.com/hospitalii1rioja/" target="_blank" rel="noopener noreferrer" class="fa fa-instagram"></a>
                    <a title="twitter" href="https://twitter.com/HR_II1_Oficial" target="_blank" rel="noopener noreferrer" class="fa fa-twitter" ></a>
                    <a title="youtube" href="https://www.youtube.com/channel/UC-a54YAwiMvW1aEXJeL5qIQ" target="_blank" rel="noopener noreferrer" class="fa fa-youtube-play" ></a>
                    <a title="tiktok" href="https://www.tiktok.com/@hospitalrioja_oficial" target="_blank" rel="noopener noreferrer" class="fa-brands fa-tiktok" >
                        <i class="fa-brands fa-tiktok" ></i>
                        <i class="fa-brands fa-tiktok" ></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="pie-derechos">
        <span>&#169; 2022 <b>Hospital II-1 Rioja</b> | Unidad de Informática - Todos los derechos Reservados.</span>
    </div>
</footer>

<?php wp_footer() ?>

</script>
</body>
</html>