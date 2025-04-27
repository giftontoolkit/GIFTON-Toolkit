<?php
/**
 * GIFTON Theme Functions
 */

if ( ! function_exists( 'gifton_setup' ) ) :
function gifton_setup() {
    // Load theme textdomain
    load_theme_textdomain( 'gifton', get_template_directory() . '/languages' );

    // Add default RSS feed links
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails
    add_theme_support( 'post-thumbnails' );

    // WooCommerce support
    add_theme_support( 'woocommerce' );

    // Register menu
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'gifton' ),
    ) );

    // Add support for custom logo
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-width'  => true,
        'flex-height' => true,
    ) );

    // Custom background support
    add_theme_support( 'custom-background', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ) );

    // Custom header image (optional)
    add_theme_support( 'custom-header', array(
        'width'  => 1920,
        'height' => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', ) );
    add_theme_support( 'customize-selective-refresh-widgets' );
    
}
endif;
add_action( 'after_setup_theme', 'gifton_setup' );

/**
 * Enqueue scripts and styles
 */
function gifton_scripts() {
    // Main stylesheet
    wp_enqueue_style( 'gifton-style', get_stylesheet_uri() );

    // Additional CSS
    wp_enqueue_style( 'gifton-main', get_template_directory_uri() . '/assets/css/style.css' );

    // Add Google Fonts (Roboto)
    wp_enqueue_style( 'gifton-google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap', false );

    // Inline JS for theme functions (no external js file)
    wp_add_inline_script( 'jquery-core', '
        jQuery(document).ready(function($) {
            console.log("GIFTON Theme Loaded Successfully!");
        });
    ' );
}
add_action( 'wp_enqueue_scripts', 'gifton_scripts' );

/**
 * Theme Customizer Options
 */
function gifton_customize_register( $wp_customize ) {

    // === COLORS ===
    $wp_customize->add_section( 'gifton_colors_section', array(
        'title'    => __( 'Theme Colors', 'gifton' ),
        'priority' => 30,
    ) );

    $wp_customize->add_setting( 'gifton_primary_color', array(
        'default'   => '#3a86ff', // Soft Blue
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gifton_primary_color', array(
        'label'   => __( 'Primary Color', 'gifton' ),
        'section' => 'gifton_colors_section',
        'settings' => 'gifton_primary_color',
    ) ) );

    // === TYPOGRAPHY ===
    $wp_customize->add_section( 'gifton_typography_section', array(
        'title'    => __( 'Typography', 'gifton' ),
        'priority' => 40,
    ) );

    $wp_customize->add_setting( 'gifton_font_family', array(
        'default' => 'Roboto, sans-serif',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'gifton_font_family', array(
        'label'    => __( 'Font Family', 'gifton' ),
        'section'  => 'gifton_typography_section',
        'settings' => 'gifton_font_family',
        'type'     => 'text',
        'description' => 'e.g., Roboto, Arial, sans-serif',
    ) );

    // === BACKGROUND IMAGE ===
    $wp_customize->add_section( 'background_image', array(
        'title' => __( 'Background Image', 'gifton' ),
        'priority' => 50,
    ) );
    // (Built-in already, so just using WordPress native)

    // === HEADER SETTINGS ===
    $wp_customize->add_section( 'gifton_header_section', array(
        'title'    => __( 'Header Settings', 'gifton' ),
        'priority' => 60,
    ) );

    $wp_customize->add_setting( 'gifton_header_layout', array(
        'default' => 'logo-left',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'gifton_header_layout', array(
        'label'    => __( 'Header Layout', 'gifton' ),
        'section'  => 'gifton_header_section',
        'settings' => 'gifton_header_layout',
        'type'     => 'select',
        'choices'  => array(
            'logo-left'   => 'Logo Left, Menu Right',
            'centered'    => 'Centered Logo and Menu',
        ),
    ) );

    // === BUTTON STYLE ===
    $wp_customize->add_section( 'gifton_buttons_section', array(
        'title'    => __( 'Button Styles', 'gifton' ),
        'priority' => 70,
    ) );

    $wp_customize->add_setting( 'gifton_button_style', array(
        'default' => 'rounded',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'gifton_button_style', array(
        'label'    => __( 'Button Style', 'gifton' ),
        'section'  => 'gifton_buttons_section',
        'settings' => 'gifton_button_style',
        'type'     => 'select',
        'choices'  => array(
            'rounded' => 'Rounded Corners',
            'square'  => 'Square Corners',
        ),
    ) );

    // Show/Hide Sections on Homepage
    $wp_customize->add_section('gifton_homepage_sections', array(
        'title' => __('Homepage Sections', 'gifton'),
        'priority' => 60,
    ));

    $sections = array('hero', 'featured_categories', 'featured_products', 'best_sellers', 'testimonials', 'newsletter', 'blog_posts');
    foreach ( $sections as $section ) {
        $wp_customize->add_setting('show_'.$section, array(
            'default' => true,
            'sanitize_callback' => 'gifton_sanitize_checkbox',
        ));
        $wp_customize->add_control('show_'.$section, array(
            'label' => ucfirst(str_replace('_', ' ', $section)),
            'section' => 'gifton_homepage_sections',
            'type' => 'checkbox',
        ));
    }

}
add_action( 'customize_register', 'gifton_customize_register' );

// Checkbox sanitizer
function gifton_sanitize_checkbox( $checked ) {
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}


// Output custom styles based on Customizer settings
function gifton_customizer_css() {
    ?>
    <style type="text/css">
        :root {
            --primary-color: <?php echo esc_attr( get_theme_mod( 'primary_color', '#3a86ff' ) ); ?>;
            --body-font-size: <?php echo esc_attr( get_theme_mod( 'body_font_size', '16px' ) ); ?>;
        }

        body {
            font-size: var(--body-font-size);
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: '<?php echo esc_attr( get_theme_mod( 'heading_font_family', 'Roboto' ) ); ?>', sans-serif;
        }

        .button, button, input[type="submit"] {
            background-color: var(--primary-color);
        }
    </style>
    <?php
}
add_action('wp_head', 'gifton_customizer_css');

// Register widget area (sidebar)
function gifton_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Sidebar', 'gifton' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here.', 'gifton' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'gifton_widgets_init' );
?>