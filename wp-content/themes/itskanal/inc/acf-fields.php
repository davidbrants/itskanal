<?php
/**
 * ACF Custom Fields Configuration
 *
 * This file defines custom fields for easy content editing.
 * Requires Advanced Custom Fields Pro plugin.
 *
 * @package ITS_KANAL
 */

if (!defined('ABSPATH')) {
    exit;
}

// Check if ACF Pro is active
if (!function_exists('acf_add_local_field_group')) {
    return;
}

/**
 * Homepage Hero Section Fields
 */
acf_add_local_field_group(array(
    'key' => 'group_hero_section',
    'title' => 'Hero Section',
    'fields' => array(
        array(
            'key' => 'field_hero_title',
            'label' => 'Hero Title',
            'name' => 'hero_title',
            'type' => 'text',
            'default_value' => 'iTS KANAL SERVICES – IHR SPEZIALIST FÜR ROHR, KANAL- UND FLÄCHENSERVICES',
        ),
        array(
            'key' => 'field_hero_subtitle',
            'label' => 'Hero Subtitle',
            'name' => 'hero_subtitle',
            'type' => 'text',
            'default_value' => 'Europas führender Anbieter von Wasserinfrastrukturlösungen',
        ),
        array(
            'key' => 'field_hero_background',
            'label' => 'Hero Background Image',
            'name' => 'hero_background',
            'type' => 'image',
            'return_format' => 'url',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_type',
                'operator' => '==',
                'value' => 'front_page',
            ),
        ),
    ),
));

/**
 * Services Section Fields
 */
acf_add_local_field_group(array(
    'key' => 'group_services_section',
    'title' => 'Services Section',
    'fields' => array(
        array(
            'key' => 'field_services_title',
            'label' => 'Section Title',
            'name' => 'services_title',
            'type' => 'text',
            'default_value' => 'Unsere Dienstleistungen',
        ),
        array(
            'key' => 'field_services_subtitle',
            'label' => 'Section Subtitle',
            'name' => 'services_subtitle',
            'type' => 'text',
            'default_value' => 'Professionelle Lösungen für alle Ihre Kanal- und Rohranforderungen',
        ),
        array(
            'key' => 'field_services_items',
            'label' => 'Service Items',
            'name' => 'services_items',
            'type' => 'repeater',
            'layout' => 'block',
            'button_label' => 'Add Service',
            'sub_fields' => array(
                array(
                    'key' => 'field_service_title',
                    'label' => 'Service Title',
                    'name' => 'service_title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_service_description',
                    'label' => 'Service Description',
                    'name' => 'service_description',
                    'type' => 'textarea',
                ),
                array(
                    'key' => 'field_service_link',
                    'label' => 'Service Link',
                    'name' => 'service_link',
                    'type' => 'url',
                ),
                array(
                    'key' => 'field_service_icon',
                    'label' => 'Service Icon',
                    'name' => 'service_icon',
                    'type' => 'image',
                    'return_format' => 'url',
                ),
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_type',
                'operator' => '==',
                'value' => 'front_page',
            ),
        ),
    ),
));

/**
 * Testimonials Section Fields
 */
acf_add_local_field_group(array(
    'key' => 'group_testimonials_section',
    'title' => 'Testimonials Section',
    'fields' => array(
        array(
            'key' => 'field_testimonials_title',
            'label' => 'Section Title',
            'name' => 'testimonials_title',
            'type' => 'text',
            'default_value' => 'Das sagen unsere Kunden',
        ),
        array(
            'key' => 'field_testimonials_items',
            'label' => 'Testimonials',
            'name' => 'testimonials_items',
            'type' => 'repeater',
            'layout' => 'block',
            'button_label' => 'Add Testimonial',
            'sub_fields' => array(
                array(
                    'key' => 'field_testimonial_content',
                    'label' => 'Testimonial Content',
                    'name' => 'testimonial_content',
                    'type' => 'textarea',
                ),
                array(
                    'key' => 'field_testimonial_author',
                    'label' => 'Author Name',
                    'name' => 'testimonial_author',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_testimonial_position',
                    'label' => 'Author Position',
                    'name' => 'testimonial_position',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_testimonial_rating',
                    'label' => 'Rating',
                    'name' => 'testimonial_rating',
                    'type' => 'number',
                    'default_value' => 5,
                    'min' => 1,
                    'max' => 5,
                ),
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_type',
                'operator' => '==',
                'value' => 'front_page',
            ),
        ),
    ),
));

/**
 * Contact Information Fields
 */
acf_add_local_field_group(array(
    'key' => 'group_contact_info',
    'title' => 'Contact Information',
    'fields' => array(
        array(
            'key' => 'field_emergency_phone',
            'label' => 'Emergency Phone',
            'name' => 'emergency_phone',
            'type' => 'text',
            'default_value' => '056 300 00 78',
        ),
        array(
            'key' => 'field_email',
            'label' => 'Email Address',
            'name' => 'contact_email',
            'type' => 'email',
        ),
        array(
            'key' => 'field_address',
            'label' => 'Address',
            'name' => 'contact_address',
            'type' => 'textarea',
            'default_value' => 'Wohlerstrasse 2, 5623 Boswil',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'options_page',
                'operator' => '==',
                'value' => 'theme-general-settings',
            ),
        ),
    ),
));

/**
 * Add Options Page for Theme Settings
 */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}
