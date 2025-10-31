<?php
/**
 * Template Name: About Us
 * Template for About Us page
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
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Über uns</h1>
        <p class="text-xl text-gray-100">Wer wir als Organisation sind</p>
    </div>
</div>

<div class="container-custom section-padding">

    <!-- Company Introduction -->
    <div class="max-w-4xl mx-auto mb-16">
        <div class="prose max-w-none">
            <h2 class="text-3xl font-bold text-its-blue mb-6">Europas führender Anbieter von Wasserinfrastrukturlösungen</h2>
            <p class="text-lg text-gray-700 mb-4">
                Mit über 50 Jahren Erfahrung und mehr als 1.000 hochqualifizierten Mitarbeitern sind wir Ihr zuverlässiger Partner
                für alle Aufgaben rund um Wasser-, Kanal- und Rohrsysteme. Unser Engagement für Qualität, Innovation und
                Nachhaltigkeit macht uns zum bevorzugten Partner für Privatkunden, Unternehmen und Gemeinden in der gesamten Region.
            </p>
        </div>
    </div>

    <!-- Values Section -->
    <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl p-8 md:p-12 mb-16">
        <h2 class="text-3xl font-bold text-its-blue mb-12 text-center">Unsere Werte</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="w-20 h-20 bg-its-blue text-white rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3">Qualität</h3>
                <p class="text-gray-700">Höchste Standards bei allen unseren Dienstleistungen</p>
            </div>
            <div class="text-center">
                <div class="w-20 h-20 bg-its-blue text-white rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3">Nachhaltigkeit</h3>
                <p class="text-gray-700">Umweltfreundliche Lösungen für eine bessere Zukunft</p>
            </div>
            <div class="text-center">
                <div class="w-20 h-20 bg-its-blue text-white rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3">Partnerschaft</h3>
                <p class="text-gray-700">Langfristige Beziehungen basierend auf Vertrauen</p>
            </div>
        </div>
    </div>

    <!-- Mission & Vision -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-16">
        <div>
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 bg-its-blue-light text-white rounded-lg flex items-center justify-center mr-4">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-its-blue">Unsere Mission</h3>
            </div>
            <p class="text-gray-700 leading-relaxed">
                Wir setzen uns dafür ein, innovative und nachhaltige Lösungen anzubieten, die die Infrastruktur unserer
                Kunden langfristig sichern und optimieren. Durch kontinuierliche Weiterbildung und den Einsatz modernster
                Technologie gewährleisten wir höchste Qualität und Zuverlässigkeit.
            </p>
        </div>
        <div>
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 bg-its-blue-light text-white rounded-lg flex items-center justify-center mr-4">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-its-blue">Unsere Vision</h3>
            </div>
            <p class="text-gray-700 leading-relaxed">
                Wir streben danach, der bevorzugte Partner für Wasserinfrastrukturlösungen in ganz Europa zu werden.
                Durch Innovation, Exzellenz und Kundenorientierung wollen wir neue Standards in unserer Branche setzen
                und einen positiven Beitrag für die Umwelt leisten.
            </p>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="bg-gradient-to-br from-its-blue to-its-blue-dark text-white rounded-2xl p-8 md:p-12">
        <h2 class="text-3xl font-bold mb-12 text-center">iTS in Zahlen</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div>
                <div class="text-4xl md:text-5xl font-bold mb-2">50+</div>
                <div class="text-gray-200">Jahre Erfahrung</div>
            </div>
            <div>
                <div class="text-4xl md:text-5xl font-bold mb-2">1,000+</div>
                <div class="text-gray-200">Mitarbeiter</div>
            </div>
            <div>
                <div class="text-4xl md:text-5xl font-bold mb-2">25+</div>
                <div class="text-gray-200">Standorte</div>
            </div>
            <div>
                <div class="text-4xl md:text-5xl font-bold mb-2">24/7</div>
                <div class="text-gray-200">Verfügbarkeit</div>
            </div>
        </div>
    </div>

</div>

<?php
get_footer();
