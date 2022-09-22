<?php get_header(); ?>

<div class="container my-4">
    <div class="row">
        <?php if(have_posts()){
            while(have_posts()){
                the_post();?>
                <div class="col-12 text-center">
                    <h1><?php the_archive_title()?></h1>
                </div>
                <div class="col-4 text-center-single-archive">
                    <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('thumbnail'); ?>
                    <h4><?php the_title(); ?></h4>
                    </a>
                </div>
            <?php
            }
        } ?>

    <?php the_posts_pagination(
        array(
        'mid_size'  => 2,
        'prev_text' => __( 'Back', 'textdomain' ),
        'next_text' => __( 'Onward', 'textdomain' ),
        )
    );
    ?>
    </div>
</div>


<?php get_footer(); ?>
