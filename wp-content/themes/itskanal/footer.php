<?php
/**
 * Footer template
 *
 * @package ITS_KANAL
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

    </main><!-- #primary -->

    <footer id="colophon" class="site-footer bg-its-blue text-white">

        <!-- Main Footer Content -->
        <div class="footer-widgets section-padding bg-its-blue-dark">
            <div class="container-custom">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

                    <!-- Footer Column 1 - Company Info -->
                    <div class="footer-column">
                        <div class="mb-6">
                            <?php if (has_custom_logo()) : ?>
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/ITS-LOGOSTRAP-RGB.png'); ?>" alt="<?php bloginfo('name'); ?>" class="h-12 w-auto brightness-0 invert">
                            <?php else : ?>
                                <h3 class="text-2xl font-bold"><?php bloginfo('name'); ?></h3>
                            <?php endif; ?>
                        </div>
                        <div class="space-y-3 text-gray-300">
                            <p class="font-semibold text-white"><?php esc_html_e('24/7 Notfall-Hotline', 'itskanal'); ?></p>
                            <p class="text-2xl font-bold text-white"><?php echo esc_html(get_theme_mod('itskanal_phone', '056 300 00 78')); ?></p>
                            <p class="text-sm">
                                <?php echo esc_html(get_theme_mod('itskanal_address', 'Wohlerstrasse 2, 5623 Boswil')); ?>
                            </p>
                        </div>
                        <?php if (is_active_sidebar('footer-1')) : ?>
                            <?php dynamic_sidebar('footer-1'); ?>
                        <?php endif; ?>
                    </div>

                    <!-- Footer Column 2 - Services -->
                    <div class="footer-column">
                        <h3 class="text-lg font-bold mb-4"><?php esc_html_e('Dienstleistungen', 'itskanal'); ?></h3>
                        <?php if (is_active_sidebar('footer-2')) : ?>
                            <?php dynamic_sidebar('footer-2'); ?>
                        <?php else : ?>
                            <ul class="space-y-2 text-gray-300">
                                <li><a href="#" class="hover:text-white transition-colors"><?php esc_html_e('Rohrreinigung', 'itskanal'); ?></a></li>
                                <li><a href="#" class="hover:text-white transition-colors"><?php esc_html_e('Kanalreinigung', 'itskanal'); ?></a></li>
                                <li><a href="#" class="hover:text-white transition-colors"><?php esc_html_e('Kanalinspektion', 'itskanal'); ?></a></li>
                                <li><a href="#" class="hover:text-white transition-colors"><?php esc_html_e('Kanalsanierung', 'itskanal'); ?></a></li>
                                <li><a href="#" class="hover:text-white transition-colors"><?php esc_html_e('Flächenreinigung', 'itskanal'); ?></a></li>
                            </ul>
                        <?php endif; ?>
                    </div>

                    <!-- Footer Column 3 - Company -->
                    <div class="footer-column">
                        <h3 class="text-lg font-bold mb-4"><?php esc_html_e('Unternehmen', 'itskanal'); ?></h3>
                        <?php if (is_active_sidebar('footer-3')) : ?>
                            <?php dynamic_sidebar('footer-3'); ?>
                        <?php else : ?>
                            <ul class="space-y-2 text-gray-300">
                                <li><a href="#" class="hover:text-white transition-colors"><?php esc_html_e('Über uns', 'itskanal'); ?></a></li>
                                <li><a href="#" class="hover:text-white transition-colors"><?php esc_html_e('Standorte', 'itskanal'); ?></a></li>
                                <li><a href="#" class="hover:text-white transition-colors"><?php esc_html_e('Karriere', 'itskanal'); ?></a></li>
                                <li><a href="#" class="hover:text-white transition-colors"><?php esc_html_e('Nachhaltigkeit', 'itskanal'); ?></a></li>
                                <li><a href="#" class="hover:text-white transition-colors"><?php esc_html_e('News', 'itskanal'); ?></a></li>
                            </ul>
                        <?php endif; ?>
                    </div>

                    <!-- Footer Column 4 - Additional -->
                    <div class="footer-column">
                        <h3 class="text-lg font-bold mb-4"><?php esc_html_e('Weitere Links', 'itskanal'); ?></h3>
                        <?php if (is_active_sidebar('footer-4')) : ?>
                            <?php dynamic_sidebar('footer-4'); ?>
                        <?php else : ?>
                            <ul class="space-y-2 text-gray-300">
                                <li><a href="#" class="hover:text-white transition-colors"><?php esc_html_e('Kontakt', 'itskanal'); ?></a></li>
                                <li><a href="#" class="hover:text-white transition-colors"><?php esc_html_e('Referenzen', 'itskanal'); ?></a></li>
                                <li><a href="#" class="hover:text-white transition-colors"><?php esc_html_e('Geschäftskunden', 'itskanal'); ?></a></li>
                                <li><a href="#" class="hover:text-white transition-colors"><?php esc_html_e('Partner werden', 'itskanal'); ?></a></li>
                            </ul>
                        <?php endif; ?>

                        <!-- Social Media -->
                        <div class="mt-6">
                            <h4 class="text-sm font-semibold mb-3"><?php esc_html_e('Folgen Sie uns', 'itskanal'); ?></h4>
                            <div class="flex space-x-4">
                                <?php if (get_theme_mod('itskanal_linkedin')) : ?>
                                    <a href="<?php echo esc_url(get_theme_mod('itskanal_linkedin')); ?>" target="_blank" rel="noopener" class="text-gray-300 hover:text-white transition-colors">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                                    </a>
                                <?php endif; ?>
                                <?php if (get_theme_mod('itskanal_instagram')) : ?>
                                    <a href="<?php echo esc_url(get_theme_mod('itskanal_instagram')); ?>" target="_blank" rel="noopener" class="text-gray-300 hover:text-white transition-colors">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom bg-its-blue-dark border-t border-its-blue py-6">
            <div class="container-custom">
                <div class="flex flex-col md:flex-row justify-between items-center text-sm text-gray-300">
                    <div class="mb-4 md:mb-0">
                        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('Alle Rechte vorbehalten.', 'itskanal'); ?></p>
                    </div>
                    <div class="flex space-x-6">
                        <a href="#" class="hover:text-white transition-colors"><?php esc_html_e('Impressum', 'itskanal'); ?></a>
                        <a href="#" class="hover:text-white transition-colors"><?php esc_html_e('Datenschutz', 'itskanal'); ?></a>
                        <a href="#" class="hover:text-white transition-colors"><?php esc_html_e('AGB', 'itskanal'); ?></a>
                    </div>
                </div>
            </div>
        </div>

    </footer><!-- #colophon -->

</div><!-- #page -->

<!-- Appointment Modal -->
<div id="appointment-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-lg max-w-md w-full p-6 relative">
        <button id="close-modal" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
        <h2 class="text-2xl font-bold mb-4 text-its-blue"><?php esc_html_e('Termin vereinbaren', 'itskanal'); ?></h2>
        <p class="text-gray-600 mb-6"><?php esc_html_e('Bitte rufen Sie uns an oder nutzen Sie unser Kontaktformular.', 'itskanal'); ?></p>
        <div class="space-y-4">
            <a href="tel:+41563000078" class="btn-primary w-full text-center block">
                <?php esc_html_e('Jetzt anrufen', 'itskanal'); ?>
            </a>
            <a href="#contact-form" id="go-to-contact" class="btn-secondary w-full text-center block">
                <?php esc_html_e('Kontaktformular', 'itskanal'); ?>
            </a>
        </div>
    </div>
</div>

<?php wp_footer(); ?>

</body>
</html>
