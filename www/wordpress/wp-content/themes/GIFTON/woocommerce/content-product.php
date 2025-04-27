<?php
/**
 * Product Loop Content Template for WooCommerce
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
    return;
}
?>

<li <?php wc_product_class( '', $product ); ?>>
    <div class="product-item">
        <a href="<?php the_permalink(); ?>" class="product-link">
            <?php woocommerce_show_product_loop_sale_flash(); ?>
            <?php woocommerce_template_loop_product_thumbnail(); ?>
            <h2 class="woocommerce-loop-product__title"><?php the_title(); ?></h2>
            <?php woocommerce_template_loop_price(); ?>
        </a>
        <?php woocommerce_template_loop_add_to_cart(); ?>
    </div>
</li>
