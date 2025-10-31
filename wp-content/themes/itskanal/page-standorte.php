<?php
/**
 * Template Name: Standorte (Locations)
 * Template for displaying locations/service centers
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
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Standorte</h1>
        <p class="text-xl text-gray-100">Finden Sie einen iTS-Fachbetrieb in Ihrer Region</p>
    </div>
</div>

<div class="container-custom section-padding">
    <div class="max-w-6xl mx-auto">

        <!-- Introduction -->
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-its-blue mb-4">
                FINDEN SIE EINEN iTS-FACHBETRIEB IN IHRER REGION
            </h2>
            <p class="text-lg text-gray-700 max-w-3xl mx-auto">
                Mit über 25 Standorten in der Schweiz, Deutschland und Österreich sind wir immer in Ihrer Nähe.
                Unsere qualifizierten Fachbetriebe bieten umfassende Dienstleistungen für alle Ihre Anforderungen.
            </p>
        </div>

        <!-- Location Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- Schweiz Locations -->
            <div class="location-card bg-white rounded-lg shadow-md p-6 hover:shadow-xl transition-shadow duration-300 border-l-4 border-its-blue">
                <div class="flex items-start justify-between mb-4">
                    <h3 class="text-xl font-bold text-its-blue">Boswil</h3>
                    <span class="flex items-center text-green-600 text-sm">
                        <span class="w-2 h-2 bg-green-600 rounded-full mr-2 animate-pulse"></span>
                        Jetzt erreichbar
                    </span>
                </div>
                <div class="space-y-2 text-gray-700">
                    <p class="font-semibold">iTS KANAL SERVICES AG</p>
                    <p class="text-sm">Wohlerstrasse 2<br>5623 Boswil</p>
                    <a href="tel:+41563000078" class="text-its-blue hover:text-its-blue-dark font-semibold inline-flex items-center mt-3">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                        </svg>
                        056 300 00 78
                    </a>
                </div>
            </div>

            <div class="location-card bg-white rounded-lg shadow-md p-6 hover:shadow-xl transition-shadow duration-300 border-l-4 border-its-blue">
                <div class="flex items-start justify-between mb-4">
                    <h3 class="text-xl font-bold text-its-blue">Wallisellen</h3>
                    <span class="flex items-center text-green-600 text-sm">
                        <span class="w-2 h-2 bg-green-600 rounded-full mr-2 animate-pulse"></span>
                        Jetzt erreichbar
                    </span>
                </div>
                <div class="space-y-2 text-gray-700">
                    <p class="font-semibold">iTS KANAL SERVICES AG</p>
                    <p class="text-sm">Richtistrasse 7<br>8304 Wallisellen</p>
                    <a href="tel:+41443773300" class="text-its-blue hover:text-its-blue-dark font-semibold inline-flex items-center mt-3">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                        </svg>
                        044 377 33 00
                    </a>
                </div>
            </div>

            <div class="location-card bg-white rounded-lg shadow-md p-6 hover:shadow-xl transition-shadow duration-300 border-l-4 border-its-blue">
                <div class="flex items-start justify-between mb-4">
                    <h3 class="text-xl font-bold text-its-blue">Kreuzlingen</h3>
                    <span class="flex items-center text-green-600 text-sm">
                        <span class="w-2 h-2 bg-green-600 rounded-full mr-2 animate-pulse"></span>
                        Jetzt erreichbar
                    </span>
                </div>
                <div class="space-y-2 text-gray-700">
                    <p class="font-semibold">iTS KANAL SERVICES AG</p>
                    <p class="text-sm">Hafenstrasse 58<br>8280 Kreuzlingen</p>
                    <a href="tel:+41716778080" class="text-its-blue hover:text-its-blue-dark font-semibold inline-flex items-center mt-3">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                        </svg>
                        071 677 80 80
                    </a>
                </div>
            </div>

            <!-- Partner Locations -->
            <div class="location-card bg-gray-50 rounded-lg shadow-md p-6 hover:shadow-xl transition-shadow duration-300 border-l-4 border-its-blue-light">
                <div class="flex items-start justify-between mb-4">
                    <h3 class="text-xl font-bold text-its-blue">Innsbruck</h3>
                    <span class="text-xs bg-blue-100 text-its-blue px-2 py-1 rounded">Partner</span>
                </div>
                <div class="space-y-2 text-gray-700">
                    <p class="font-semibold">ALPE Kanal-Service GmbH</p>
                    <p class="text-sm">Österreich</p>
                    <a href="#" class="text-its-blue hover:text-its-blue-dark font-semibold inline-flex items-center mt-3">
                        Kontakt anzeigen
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="location-card bg-gray-50 rounded-lg shadow-md p-6 hover:shadow-xl transition-shadow duration-300 border-l-4 border-its-blue-light">
                <div class="flex items-start justify-between mb-4">
                    <h3 class="text-xl font-bold text-its-blue">Salzburg</h3>
                    <span class="text-xs bg-blue-100 text-its-blue px-2 py-1 rounded">Partner</span>
                </div>
                <div class="space-y-2 text-gray-700">
                    <p class="font-semibold">Kanal Grabner GmbH</p>
                    <p class="text-sm">Österreich</p>
                    <a href="#" class="text-its-blue hover:text-its-blue-dark font-semibold inline-flex items-center mt-3">
                        Kontakt anzeigen
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="location-card bg-gray-50 rounded-lg shadow-md p-6 hover:shadow-xl transition-shadow duration-300 border-l-4 border-its-blue-light">
                <div class="flex items-start justify-between mb-4">
                    <h3 class="text-xl font-bold text-its-blue">Deutschland</h3>
                    <span class="text-xs bg-blue-100 text-its-blue px-2 py-1 rounded">Partner</span>
                </div>
                <div class="space-y-2 text-gray-700">
                    <p class="font-semibold">Feucht GmbH</p>
                    <p class="text-sm">Mehrere Standorte</p>
                    <a href="#" class="text-its-blue hover:text-its-blue-dark font-semibold inline-flex items-center mt-3">
                        Kontakt anzeigen
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>

        </div>

        <!-- CTA Section -->
        <div class="mt-16 bg-gradient-to-br from-its-blue to-its-blue-dark text-white rounded-2xl p-8 md:p-12 text-center">
            <h3 class="text-2xl md:text-3xl font-bold mb-4">Standort nicht gefunden?</h3>
            <p class="text-lg mb-6 text-gray-100">
                Kontaktieren Sie uns telefonisch – wir helfen Ihnen gerne weiter!
            </p>
            <a href="tel:+41563000078" class="btn-primary bg-white text-its-blue hover:bg-gray-100">
                056 300 00 78
            </a>
        </div>

    </div>
</div>

<?php
get_footer();
