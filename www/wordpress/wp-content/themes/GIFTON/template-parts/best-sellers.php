<?php
/**
 * Best Sellers Section
 */
?>

<section class="best-sellers">
    <div class="container">
        <h2 class="section-title">Best Sellers</h2>
        <div class="product-grid">
            <?php
            echo do_shortcode('[products limit="8" columns="4" best_selling="true"]');
            ?>
        </div>
    </div>
</section>
