<?php
/**
 * iTS KANAL Theme Functions
 *
 * @package ITS_KANAL
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Theme version
define('ITSKANAL_VERSION', '1.0.0');

/**
 * Theme Setup
 */
function itskanal_setup() {
    // Make theme available for translation
    load_theme_textdomain('itskanal', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');

    // Set default thumbnail size
    set_post_thumbnail_size(1200, 800, true);

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'itskanal'),
        'top-menu' => __('Top Menu', 'itskanal'),
        'footer-menu-1' => __('Footer Menu 1', 'itskanal'),
        'footer-menu-2' => __('Footer Menu 2', 'itskanal'),
        'footer-menu-3' => __('Footer Menu 3', 'itskanal'),
    ));

    // Switch default core markup to output valid HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Add theme support for Custom Logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Add theme support for Block Styles
    add_theme_support('wp-block-styles');

    // Add support for full and wide align images
    add_theme_support('align-wide');

    // Add support for responsive embeds
    add_theme_support('responsive-embeds');

    // Add support for editor styles
    add_theme_support('editor-styles');
}
add_action('after_setup_theme', 'itskanal_setup');

/**
 * Enqueue scripts and styles
 */
function itskanal_scripts() {
    // Enqueue Tailwind CSS
    wp_enqueue_style('itskanal-style', get_template_directory_uri() . '/assets/css/style.css', array(), ITSKANAL_VERSION);

    // Enqueue Lottie Player
    wp_enqueue_script('lottie-player', 'https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js', array(), null, true);

    // Enqueue main JavaScript
    wp_enqueue_script('itskanal-main', get_template_directory_uri() . '/assets/js/main.js', array(), ITSKANAL_VERSION, true);

    // Localize script for AJAX
    wp_localize_script('itskanal-main', 'itskanal_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('itskanal_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'itskanal_scripts');

/**
 * Register widget areas
 */
function itskanal_widgets_init() {
    register_sidebar(array(
        'name'          => __('Footer 1', 'itskanal'),
        'id'            => 'footer-1',
        'description'   => __('Add widgets here to appear in footer column 1.', 'itskanal'),
        'before_widget' => '<div id="%1$s" class="widget mb-8 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="text-lg font-bold mb-4 text-white">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer 2', 'itskanal'),
        'id'            => 'footer-2',
        'description'   => __('Add widgets here to appear in footer column 2.', 'itskanal'),
        'before_widget' => '<div id="%1$s" class="widget mb-8 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="text-lg font-bold mb-4 text-white">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer 3', 'itskanal'),
        'id'            => 'footer-3',
        'description'   => __('Add widgets here to appear in footer column 3.', 'itskanal'),
        'before_widget' => '<div id="%1$s" class="widget mb-8 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="text-lg font-bold mb-4 text-white">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer 4', 'itskanal'),
        'id'            => 'footer-4',
        'description'   => __('Add widgets here to appear in footer column 4.', 'itskanal'),
        'before_widget' => '<div id="%1$s" class="widget mb-8 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="text-lg font-bold mb-4 text-white">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'itskanal_widgets_init');

/**
 * Security Enhancements
 */

// Remove WordPress version from head
remove_action('wp_head', 'wp_generator');

// Disable XML-RPC
add_filter('xmlrpc_enabled', '__return_false');

// Remove RSD link
remove_action('wp_head', 'rsd_link');

// Remove wlwmanifest link
remove_action('wp_head', 'wlwmanifest_link');

// Disable file editing in dashboard
if (!defined('DISALLOW_FILE_EDIT')) {
    define('DISALLOW_FILE_EDIT', true);
}

// Add security headers
function itskanal_security_headers() {
    header('X-Frame-Options: SAMEORIGIN');
    header('X-Content-Type-Options: nosniff');
    header('X-XSS-Protection: 1; mode=block');
    header('Referrer-Policy: strict-origin-when-cross-origin');
}
add_action('send_headers', 'itskanal_security_headers');

/**
 * Custom template tags
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * ACF Custom Fields (if ACF is installed)
 */
if (file_exists(get_template_directory() . '/inc/acf-fields.php')) {
    require get_template_directory() . '/inc/acf-fields.php';
}
