<?php
/**
 * Hero Section Template
 */
?>

<section class="hero-section" style="background-image: url('<?php echo esc_url( get_theme_mod('background_image') ); ?>');">
    <div class="container hero-content">
        <h1><?php bloginfo('name'); ?></h1>
        <p><?php bloginfo('description'); ?></p>
        <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="btn-primary">Shop Now</a>
    </div>
</section>
