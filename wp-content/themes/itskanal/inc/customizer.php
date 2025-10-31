<?php
/**
 * Theme Customizer
 *
 * @package ITS_KANAL
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add postMessage support for site title and description
 */
function itskanal_customize_register($wp_customize) {
    $wp_customize->get_setting('blogname')->transport         = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';

    // Add Contact Information Section
    $wp_customize->add_section('itskanal_contact', array(
        'title'    => __('Contact Information', 'itskanal'),
        'priority' => 30,
    ));

    // Phone Number
    $wp_customize->add_setting('itskanal_phone', array(
        'default'           => '056 300 00 78',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('itskanal_phone', array(
        'label'    => __('Phone Number', 'itskanal'),
        'section'  => 'itskanal_contact',
        'type'     => 'text',
    ));

    // Email Address
    $wp_customize->add_setting('itskanal_email', array(
        'default'           => 'info@itskanal.com',
        'sanitize_callback' => 'sanitize_email',
    ));

    $wp_customize->add_control('itskanal_email', array(
        'label'    => __('Email Address', 'itskanal'),
        'section'  => 'itskanal_contact',
        'type'     => 'email',
    ));

    // Address
    $wp_customize->add_setting('itskanal_address', array(
        'default'           => 'Wohlerstrasse 2, 5623 Boswil',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('itskanal_address', array(
        'label'    => __('Address', 'itskanal'),
        'section'  => 'itskanal_contact',
        'type'     => 'text',
    ));

    // Social Media Section
    $wp_customize->add_section('itskanal_social', array(
        'title'    => __('Social Media Links', 'itskanal'),
        'priority' => 31,
    ));

    // LinkedIn
    $wp_customize->add_setting('itskanal_linkedin', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('itskanal_linkedin', array(
        'label'    => __('LinkedIn URL', 'itskanal'),
        'section'  => 'itskanal_social',
        'type'     => 'url',
    ));

    // Instagram
    $wp_customize->add_setting('itskanal_instagram', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('itskanal_instagram', array(
        'label'    => __('Instagram URL', 'itskanal'),
        'section'  => 'itskanal_social',
        'type'     => 'url',
    ));

    // Partner Logos Section
    $wp_customize->add_section('itskanal_partners', array(
        'title'    => __('Partner Logos', 'itskanal'),
        'priority' => 32,
    ));

    // Partner Logo 1 - ALPE
    $wp_customize->add_setting('partner_logo_1', array(
        'default'           => '',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'partner_logo_1', array(
        'label'     => __('ALPE Logo', 'itskanal'),
        'section'   => 'itskanal_partners',
        'mime_type' => 'image',
    )));

    // Partner Logo 2 - Arelt
    $wp_customize->add_setting('partner_logo_2', array(
        'default'           => '',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'partner_logo_2', array(
        'label'     => __('Arelt Logo', 'itskanal'),
        'section'   => 'itskanal_partners',
        'mime_type' => 'image',
    )));

    // Partner Logo 3 - Feucht
    $wp_customize->add_setting('partner_logo_3', array(
        'default'           => '',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'partner_logo_3', array(
        'label'     => __('Feucht Logo', 'itskanal'),
        'section'   => 'itskanal_partners',
        'mime_type' => 'image',
    )));

    // Partner Logo 4 - Grabner
    $wp_customize->add_setting('partner_logo_4', array(
        'default'           => '',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'partner_logo_4', array(
        'label'     => __('Grabner Logo', 'itskanal'),
        'section'   => 'itskanal_partners',
        'mime_type' => 'image',
    )));

    // Partner Logo 5 - Künzli
    $wp_customize->add_setting('partner_logo_5', array(
        'default'           => '',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'partner_logo_5', array(
        'label'     => __('Künzli Logo', 'itskanal'),
        'section'   => 'itskanal_partners',
        'mime_type' => 'image',
    )));

    // Show/Hide Partner Section
    $wp_customize->add_setting('show_partner_section', array(
        'default'           => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
    ));

    $wp_customize->add_control('show_partner_section', array(
        'label'    => __('Show Partner Section', 'itskanal'),
        'section'  => 'itskanal_partners',
        'type'     => 'checkbox',
    ));
}
add_action('customize_register', 'itskanal_customize_register');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously
 */
function itskanal_customize_preview_js() {
    wp_enqueue_script('itskanal-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array('customize-preview'), ITSKANAL_VERSION, true);
}
add_action('customize_preview_init', 'itskanal_customize_preview_js');
