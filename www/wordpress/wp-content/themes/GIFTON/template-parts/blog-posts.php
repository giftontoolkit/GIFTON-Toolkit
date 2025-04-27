<?php
/**
 * Blog Posts Section
 */
?>

<section class="blog-posts">
    <div class="container">
        <h2 class="section-title">Latest from Blog</h2>
        <div class="blog-grid">
            <?php
            $recent_posts = new WP_Query(array(
                'posts_per_page' => 3,
            ));
            while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
                <div class="blog-item">
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium'); ?>
                        <?php endif; ?>
                        <h3><?php the_title(); ?></h3>
                    </a>
                </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
</section>
