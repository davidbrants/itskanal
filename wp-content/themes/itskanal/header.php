<?php
/**
 * Header template
 *
 * @package ITS_KANAL
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class('antialiased'); ?>>
<?php wp_body_open(); ?>

<div id="page" class="min-h-screen flex flex-col">

    <!-- Top Header Bar -->
    <div class="bg-gray-100 border-b border-gray-200 hidden md:block">
        <div class="container-custom">
            <div class="flex justify-between items-center py-2 text-sm">
                <div class="flex items-center space-x-6">
                    <?php if (has_nav_menu('top-menu')) : ?>
                        <nav class="top-menu">
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'top-menu',
                                'container'      => false,
                                'menu_class'     => 'flex space-x-4',
                                'link_class'     => 'text-gray-600 hover:text-its-blue',
                            ));
                            ?>
                        </nav>
                    <?php endif; ?>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="language-switcher flex space-x-2">
                        <!-- Language switcher - will be populated by WPML or Polylang -->
                        <span class="text-gray-600">DE</span>
                        <span class="text-gray-400">|</span>
                        <span class="text-gray-600">FR</span>
                        <span class="text-gray-400">|</span>
                        <span class="text-gray-600">IT</span>
                        <span class="text-gray-400">|</span>
                        <span class="text-gray-600">EN</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Header -->
    <header id="masthead" class="site-header bg-white shadow-md sticky top-0 z-50">
        <div class="container-custom">
            <div class="flex justify-between items-center py-4">

                <!-- Logo -->
                <div class="site-branding">
                    <?php itskanal_logo(); ?>
                </div>

                <!-- Primary Navigation -->
                <nav id="site-navigation" class="main-navigation hidden lg:flex items-center space-x-8">
                    <?php
                    if (has_nav_menu('primary')) {
                        wp_nav_menu(array(
                            'theme_location' => 'primary',
                            'container'      => false,
                            'menu_class'     => 'flex space-x-6 items-center',
                            'link_class'     => 'text-gray-700 hover:text-its-blue font-medium transition-colors',
                        ));
                    }
                    ?>
                </nav>

                <!-- CTA Buttons -->
                <div class="header-actions hidden lg:flex items-center space-x-4">
                    <a href="tel:+41563000078" class="flex items-center space-x-2 text-its-blue hover:text-its-blue-dark">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                        </svg>
                        <span class="font-bold"><?php echo esc_html(get_theme_mod('itskanal_phone', '056 300 00 78')); ?></span>
                    </a>
                    <button id="appointment-btn" class="btn-primary">
                        <?php esc_html_e('Termin vereinbaren', 'itskanal'); ?>
                    </button>
                </div>

                <!-- Mobile Menu Toggle -->
                <button id="mobile-menu-toggle" class="lg:hidden text-gray-700 focus:outline-none" aria-label="Toggle menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="lg:hidden hidden bg-white border-t border-gray-200">
            <div class="container-custom py-4">
                <?php
                if (has_nav_menu('primary')) {
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container'      => false,
                        'menu_class'     => 'flex flex-col space-y-4',
                        'link_class'     => 'text-gray-700 hover:text-its-blue font-medium',
                    ));
                }
                ?>
                <div class="mt-4 pt-4 border-t border-gray-200">
                    <a href="tel:+41563000078" class="flex items-center space-x-2 text-its-blue mb-4">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                        </svg>
                        <span class="font-bold"><?php echo esc_html(get_theme_mod('itskanal_phone', '056 300 00 78')); ?></span>
                    </a>
                    <button class="btn-primary w-full text-center">
                        <?php esc_html_e('Termin vereinbaren', 'itskanal'); ?>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <main id="primary" class="site-main flex-grow">
