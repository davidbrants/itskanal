<?php
/**
 * Custom template tags for this theme
 *
 * @package ITS_KANAL
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Display navigation menu
 */
function itskanal_nav_menu($location) {
    if (has_nav_menu($location)) {
        wp_nav_menu(array(
            'theme_location' => $location,
            'container'      => false,
            'menu_class'     => 'menu-items',
            'fallback_cb'    => false,
            'depth'          => 2,
        ));
    }
}

/**
 * Display logo
 */
function itskanal_logo() {
    if (has_custom_logo()) {
        the_custom_logo();
    } else {
        echo '<a href="' . esc_url(home_url('/')) . '" class="custom-logo-link">';
        echo '<img src="' . esc_url(get_template_directory_uri() . '/assets/images/ITS-LOGOSTRAP-RGB.png') . '" alt="' . esc_attr(get_bloginfo('name')) . '" class="h-12 w-auto">';
        echo '</a>';
    }
}

/**
 * Get formatted phone number
 */
function itskanal_phone_number() {
    return apply_filters('itskanal_phone_number', '056 300 00 78');
}

/**
 * Get emergency phone HTML
 */
function itskanal_emergency_phone() {
    $phone = itskanal_phone_number();
    $phone_clean = str_replace(' ', '', $phone);
    return '<a href="tel:+41' . esc_attr($phone_clean) . '" class="text-its-blue hover:text-its-blue-dark font-bold text-xl">' . esc_html($phone) . '</a>';
}

/**
 * Sanitize HTML output
 */
function itskanal_sanitize_html($html) {
    return wp_kses_post($html);
}
