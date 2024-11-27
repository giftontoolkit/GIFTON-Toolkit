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

// Customize Footer Text via Customizer
function gifton_customize_register($wp_customize) {
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
}
add_action('customize_register', 'gifton_customize_register');

// Output Custom Footer Text
function gifton_custom_footer_text() {
    echo esc_html(get_theme_mod('footer_text_setting', 'GIFTON Toolkit. All rights reserved.'));
}