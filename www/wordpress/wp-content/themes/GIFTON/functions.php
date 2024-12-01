<?php
// Theme Setup
function gifton_theme_setup() {
    // Enable support for custom logo
    add_theme_support('custom-logo');

    // Enable support for post thumbnails
    add_theme_support('post-thumbnails');

    // Register navigation menu
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'gifton-theme')
    ));

    // Add support for title tag
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'gifton_theme_setup');

// Enqueue Styles and Inline JavaScript
function gifton_enqueue_assets() {
    // Enqueue style.css
    wp_enqueue_style('gifton-style', get_stylesheet_uri());

    // Inline JavaScript for smooth scrolling
    wp_add_inline_script('jquery', "
        document.addEventListener('DOMContentLoaded', function() {
            const ctaButton = document.querySelector('.cta-button');
            if (ctaButton) {
                ctaButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    const featuresSection = document.querySelector('#features');
                    if (featuresSection) {
                        window.scrollTo({
                            top: featuresSection.offsetTop,
                            behavior: 'smooth'
                        });
                    }
                });
            }
        });
    ");
}
add_action('wp_enqueue_scripts', 'gifton_enqueue_assets');

// Add Theme Customization Options
function gifton_customize_register($wp_customize) {
    // Footer Section
    $wp_customize->add_section('gifton_footer_section', array(
        'title' => __('Footer Customization', 'gifton-theme'),
        'priority' => 120,
    ));
    $wp_customize->add_setting('footer_text_setting', array(
        'default' => 'GIFTON Toolkit. All rights reserved.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('footer_text_control', array(
        'label' => __('Footer Text', 'gifton-theme'),
        'section' => 'gifton_footer_section',
        'settings' => 'footer_text_setting',
        'type' => 'text',
    ));

    // Color Customization
    $wp_customize->add_setting('header_background_color', array(
        'default' => '#2c3e50',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_background_color', array(
        'label' => __('Header Background Color', 'gifton-theme'),
        'section' => 'colors',
        'settings' => 'header_background_color',
    )));

    $wp_customize->add_setting('text_color', array(
        'default' => '#ecf0f1',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'text_color', array(
        'label' => __('Text Color', 'gifton-theme'),
        'section' => 'colors',
        'settings' => 'text_color',
    )));

    // Background Image Customization (Custom Section)
    $wp_customize->add_section('gifton_background_section', array(
        'title' => __('Landing Page Background', 'gifton-theme'),
        'priority' => 30,
    ));
    $wp_customize->add_setting('landing_bg_image', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'landing_bg_image', array(
        'label' => __('Landing Page Background Image', 'gifton-theme'),
        'section' => 'gifton_background_section',
        'settings' => 'landing_bg_image',
    )));

    // Typography Customization
    $wp_customize->add_section('typography', array(
        'title' => __('Typography', 'gifton-theme'),
        'priority' => 40,
    ));
    $wp_customize->add_setting('header_font', array(
        'default' => 'Arial, sans-serif',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('header_font_control', array(
        'label' => __('Header Font Family', 'gifton-theme'),
        'section' => 'typography',
        'settings' => 'header_font',
        'type' => 'text',
    ));
}
add_action('customize_register', 'gifton_customize_register');

// Output Custom Footer Text
function gifton_custom_footer_text() {
    echo esc_html(get_theme_mod('footer_text_setting', 'GIFTON Toolkit. All rights reserved.'));
}

// Apply Customizations via Inline CSS
function gifton_custom_styles() {
    ?>
    <style type="text/css">
        .landing-header {
            background-color: <?php echo esc_attr(get_theme_mod('header_background_color', '#2c3e50')); ?>;
            color: <?php echo esc_attr(get_theme_mod('text_color', '#ecf0f1')); ?>;
            font-family: <?php echo esc_attr(get_theme_mod('header_font', 'Arial, sans-serif')); ?>;
            background-image: url(<?php echo esc_url(get_theme_mod('landing_bg_image', '')); ?>);
            background-size: cover;
            background-position: center;
        }
    </style>
    <?php
}
add_action('wp_head', 'gifton_custom_styles');