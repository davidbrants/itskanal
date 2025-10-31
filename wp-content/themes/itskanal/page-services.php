<?php
/**
 * Template Name: Service Page
 * Generic template for service pages
 *
 * @package ITS_KANAL
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<div class="page-header bg-gradient-to-br from-its-blue to-its-blue-dark text-white section-padding">
    <div class="container-custom">
        <h1 class="text-4xl md:text-5xl font-bold mb-4"><?php the_title(); ?></h1>
        <?php if (get_field('service_subtitle')): ?>
            <p class="text-xl text-gray-100"><?php the_field('service_subtitle'); ?></p>
        <?php endif; ?>
    </div>
</div>

<div class="container-custom section-padding">
    <div class="max-w-4xl mx-auto">

        <?php
        while (have_posts()) : the_post();
            ?>

            <!-- Featured Image -->
            <?php if (has_post_thumbnail()) : ?>
                <div class="mb-8 rounded-lg overflow-hidden">
                    <?php the_post_thumbnail('large', array('class' => 'w-full h-auto')); ?>
                </div>
            <?php endif; ?>

            <!-- Main Content -->
            <div class="entry-content prose max-w-none mb-12">
                <?php the_content(); ?>
            </div>

            <!-- Service Features -->
            <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl p-8 md:p-12 mb-12">
                <h2 class="text-2xl md:text-3xl font-bold text-its-blue mb-8">Unsere Leistungen im Detail</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex items-start">
                        <svg class="w-6 h-6 text-its-blue mr-3 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1">Professionelle Ausführung</h3>
                            <p class="text-gray-700">Qualifizierte Fachkräfte mit jahrelanger Erfahrung</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <svg class="w-6 h-6 text-its-blue mr-3 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1">Modernste Technologie</h3>
                            <p class="text-gray-700">Einsatz neuester Geräte und Methoden</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <svg class="w-6 h-6 text-its-blue mr-3 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1">24/7 Verfügbarkeit</h3>
                            <p class="text-gray-700">Notdienst rund um die Uhr erreichbar</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <svg class="w-6 h-6 text-its-blue mr-3 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1">Transparente Dokumentation</h3>
                            <p class="text-gray-700">Vollständige Protokollierung aller Arbeiten</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="bg-gradient-to-br from-its-blue to-its-blue-dark text-white rounded-2xl p-8 md:p-12 text-center">
                <h3 class="text-2xl md:text-3xl font-bold mb-4">Benötigen Sie unsere Hilfe?</h3>
                <p class="text-lg mb-6 text-gray-100">
                    Kontaktieren Sie uns für eine kostenlose Beratung oder einen Notfall-Einsatz.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="tel:+41563000078" class="bg-white text-its-blue hover:bg-gray-100 font-semibold py-4 px-8 rounded-lg transition-all duration-300 inline-block">
                        📞 056 300 00 78
                    </a>
                    <a href="<?php echo esc_url(home_url('/kontakt')); ?>" class="bg-transparent border-2 border-white hover:bg-white hover:text-its-blue text-white font-semibold py-4 px-8 rounded-lg transition-all duration-300 inline-block">
                        Kontaktformular
                    </a>
                </div>
            </div>

        <?php endwhile; ?>

    </div>
</div>

<?php
get_footer();
