<?php
// Register a navigation menu
function my_custom_theme_setup() {
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'my-custom-theme'),
    ));

    // Add support for featured images
    add_theme_support('post-thumbnails');
    
    // Add support for document title tag
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'my_custom_theme_setup');