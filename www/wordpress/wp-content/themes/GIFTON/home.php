<?php
/**
 * Home Page
 */
get_header(); ?>

<main>
    
    <?php get_template_part('template-parts/hero'); ?>
    <?php get_template_part('template-parts/featured-categories'); ?>
    <?php get_template_part('template-parts/featured-products'); ?>
    <?php get_template_part('template-parts/best-sellers'); ?>
    <?php get_template_part('template-parts/testimonials'); ?>
    <?php get_template_part('template-parts/newsletter'); ?>
    <?php get_template_part('template-parts/blog-posts'); ?>

</main>

<?php
get_footer();
?>
