<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <title><?php bloginfo('name'); ?></title>
</head>

    <?php
        get_header();
    ?>

    <main>
        <div class="landing-page-container">
            <section class="hero-section">
                <h1>Welcome to GIFTON</h1>
                <p>The ultimate toolkit for eCommerce websites.</p>
                <a href="#features" class="btn-primary">Explore Features</a>
            </section>

            <section id="features" class="features-section">
                <h2>Features</h2>
                <div class="feature">
                    <h3>Customizable Design</h3>
                    <p>Create a unique shopping experience with fully customizable design options.</p>
                </div>
                <div class="feature">
                    <h3>Seamless Checkout</h3>
                    <p>Smooth and fast checkout to ensure higher conversion rates.</p>
                </div>
                <div class="feature">
                    <h3>Responsive Layout</h3>
                    <p>Enjoy a responsive and mobile-friendly experience on any device.</p>
                </div>
            </section>

            <section class="cta-section">
                <h2>Ready to Start?</h2>
                <p>Join GIFTON and start building your eCommerce website today!</p>
                <a href="/signup" class="btn-secondary">Get Started</a>
            </section>
        </div>
    </main>
    <?php
        get_footer();
    ?>
</body>
</html>
