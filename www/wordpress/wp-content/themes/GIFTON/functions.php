<?php
function gifton_enqueue_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('gifton-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'gifton_enqueue_scripts');

function jscripts() {
    echo '<script type = "text/JavaScript">
        </script>';
}
jscripts();

function custom_theme_customizer($wp_customize) {
    // Add Section
    $wp_customize->add_section('custom_theme_options', array(
        'title'    => __('Custom Theme Options', 'textdomain'),
        'priority' => 30,
    ));
    
    // Add Setting
    $wp_customize->add_setting('header_background_color', array(
        'default'   => '#ffffff',
        'transport' => 'refresh',
    ));
    
    // Add Control
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_background_color_control', array(
        'label'    => __('Header Background Color', 'textdomain'),
        'section'  => 'custom_theme_options',
        'settings' => 'header_background_color',
    )));
}
add_action('customize_register', 'custom_theme_customizer');

$header_color = get_theme_mod('header_background_color', '#ffffff');
echo "<style>index { background-color: $header_color; }</style>";

?>