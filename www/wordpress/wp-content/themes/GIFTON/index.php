<?php
/**
 * Main Index Template
 */
get_header(); ?>

<main class="site-main container">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            get_template_part( 'template-parts/content', get_post_format() );
            wp_link_pages( array(
                'before' => '<div class="page-links">' . __( 'Pages:', 'gifton' ),
                'after'  => '</div>',
            ) );
        endwhile;
        the_posts_navigation();
    else :
        get_template_part( 'template-parts/content', 'none' );
    endif;
    ?>
</main>

<?php
get_footer();
?>
