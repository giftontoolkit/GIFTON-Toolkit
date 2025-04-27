<?php
/**
 * Featured Products Section
 */
?>

<section class="featured-products">
    <div class="container">
        <h2 class="section-title">Featured Products</h2>
        <div class="product-grid">
            <?php
            echo do_shortcode('[products limit="8" columns="4" visibility="featured"]');
            ?>
        </div>
    </div>
</section>
