<?php
//Template Name: pagina de proximamente
get_header(); ?>

    <?php
        if(have_posts()){
            while(have_posts()){
                the_post(); ?>
                <div  style="text-align:center; background: #ffe5cc;">
                    <h1 class='titulo-organigrama'><?php the_title();?></h1>
                </div>
            <?php
            }
        }
    ?>


<main class='single-actividad'>

    <div id="printer-animation" class="printer-animation">
    <div class="printer">
    <input id="button" type="checkbox">
        <label class="button" for="button"></label>
        <div class="top"></div>
        <div class="middle"></div>
        <div class="trace"></div>
        <div class="paper">
        </div>
    </div>
    </div>

</main>


<?php get_footer(); ?>

