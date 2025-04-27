<?php
/**
 * Footer Template
 */
?>

<footer class="site-footer">
    <div class="container footer-container">
        <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
            <div class="footer-widget">
                <?php dynamic_sidebar( 'footer-1' ); ?>
            </div>
        <?php endif; ?>

        <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
            <div class="footer-widget">
                <?php dynamic_sidebar( 'footer-2' ); ?>
            </div>
        <?php endif; ?>

        <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
            <div class="footer-widget">
                <?php dynamic_sidebar( 'footer-3' ); ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="container footer-bottom">
        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
