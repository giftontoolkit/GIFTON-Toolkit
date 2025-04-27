<?php
/**
 * Featured Categories Section
 */
?>

<section class="featured-categories">
    <div class="container">
        <h2 class="section-title">Shop by Category</h2>
        <div class="category-grid">
            <?php
            $product_categories = get_terms( 'product_cat', array(
                'orderby'    => 'name',
                'hide_empty' => true,
                'number'     => 6,
            ) );
            if ( ! empty( $product_categories ) && ! is_wp_error( $product_categories ) ) :
                foreach ( $product_categories as $category ) :
                    $thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
                    $image = wp_get_attachment_url( $thumbnail_id );
                    ?>
                    <div class="category-item">
                        <a href="<?php echo get_term_link( $category ); ?>">
                            <?php if ( $image ) : ?>
                                <img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $category->name ); ?>">
                            <?php endif; ?>
                            <h3><?php echo esc_html( $category->name ); ?></h3>
                        </a>
                    </div>
                <?php endforeach;
            endif;
            ?>
        </div>
    </div>
</section>
