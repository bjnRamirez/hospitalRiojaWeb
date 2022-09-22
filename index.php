<?php get_header(); ?>

<?php if(have_posts()){
    while(have_posts()){
        the_post();?>
        <?php the_title();?></h1>
        <?php the_content(); ?>
    <?php } ?>
<?php } ?>

<?php get_footer(); ?>

