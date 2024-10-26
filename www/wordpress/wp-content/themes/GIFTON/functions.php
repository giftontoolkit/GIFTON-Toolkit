<?php
// Enqueue styles and scripts
function gifton_enqueue_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('gifton-style', get_stylesheet_uri());

    // Enqueue custom JavaScript file
    wp_enqueue_script('gifton-scripts', get_template_directory_uri() . '/js/scripts.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'gifton_enqueue_scripts');
?>