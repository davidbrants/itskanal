<?php
/**
 * Homepage Template
 *
 * @package ITS_KANAL
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<!-- Hero Section -->
<section class="hero-section relative bg-its-blue-dark text-white overflow-hidden min-h-[600px] md:min-h-[650px] lg:min-h-[700px]">
    <!-- Desktop & Tablet: Background Image with gradient overlay -->
    <div class="hidden md:block absolute inset-0 z-0">
        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/header-hero.webp'); ?>"
             alt="iTS KANAL Services"
             class="w-full h-full object-cover object-right">
        <div class="absolute inset-0 bg-gradient-to-r from-its-blue-dark/95 via-its-blue/60 to-transparent"></div>
    </div>

    <!-- Mobile only: Solid gradient background -->
    <div class="md:hidden absolute inset-0 z-0 bg-gradient-to-br from-its-blue to-its-blue-dark"></div>

    <!-- Mobile only: Circular hero image at top right corner -->
    <div class="md:hidden absolute top-4 right-4 z-20">
        <div class="w-40 h-40 rounded-full overflow-hidden shadow-2xl border-4 border-white/30">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/header-hero.webp'); ?>"
                 alt="iTS KANAL Services"
                 class="w-full h-full object-cover object-center">
        </div>
    </div>

    <div class="container-custom relative z-10 py-24 md:py-32 lg:py-40">
        <!-- Mobile: Dark overlay behind text for WCAG contrast -->
        <div class="md:hidden absolute left-0 top-0 right-0 bottom-0 bg-gradient-to-b from-its-blue-dark/80 via-its-blue-dark/90 to-its-blue-dark/95 -z-10"></div>

        <div class="max-w-4xl lg:max-w-2xl">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight text-shadow-strong pr-44 md:pr-0">
                iTS KANAL SERVICES – <br class="hidden md:block">
                IHR SPEZIALIST FÜR ROHR, <br class="hidden md:block">
                KANAL- UND FLÄCHENSERVICES
            </h1>
            <p class="text-xl md:text-2xl mb-8 text-gray-100 text-shadow pr-44 md:pr-0">
                Europas führender Anbieter von Wasserinfrastrukturlösungen
            </p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="tel:+41563000078" class="bg-white text-its-blue hover:bg-gray-100 font-semibold py-4 px-8 rounded-lg transition-all duration-300 inline-block text-center shadow-lg">
                    📞 056 300 00 78
                </a>
                <button id="appointment-btn-hero" class="bg-its-blue-light hover:bg-opacity-90 text-white font-semibold py-4 px-8 rounded-lg transition-all duration-300 inline-block border-2 border-white shadow-lg">
                    Termin vereinbaren
                </button>
            </div>
        </div>
    </div>
    <div class="absolute bottom-0 left-0 right-0 h-16 bg-gradient-to-t from-white to-transparent"></div>
</section>

<!-- Partner Logos Section -->
<section class="partners-section bg-white py-12 md:py-16 border-b border-gray-100 overflow-hidden">
    <div class="container-custom">
        <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-center mb-12" style="color: #0024BE;">
            <span style="color: #0024BE;">ERFOLG</span> <span style="color: #00BCD4;">DURCH PARTNERSCHAFT</span>
        </h2>
    </div>
    <div class="partner-logos-slider relative">
        <div class="partner-logos-track">
            <?php
            $partner_logos = array(
                array('file' => 'grabner.png', 'name' => 'Kanal Grabner'),
                array('file' => 'kuenzli.png', 'name' => 'Groupe Künzli'),
                array('file' => 'lt.png', 'name' => 'LT Rohrexperten'),
                array('file' => 'restclean.png', 'name' => 'RestClean'),
                array('file' => 'alpe.png', 'name' => 'ALPE'),
                array('file' => 'feucht.png', 'name' => 'Feucht GmbH'),
                array('file' => 'arelt.png', 'name' => 'ARELT'),
            );

            // Duplicate logos for seamless loop
            $all_logos = array_merge($partner_logos, $partner_logos);

            foreach ($all_logos as $logo) :
                $logo_url = get_template_directory_uri() . '/assets/images/partners/' . $logo['file'];
            ?>
            <div class="partner-logo-item">
                <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr($logo['name']); ?>" loading="lazy">
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Services Overview Section -->
<section class="services-section section-padding bg-gray-50">
    <div class="container-custom">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-6">
                <span style="color: #0024BE;">UNSERE</span> <span style="color: #00BCD4;">LEISTUNGEN</span>
            </h2>
            <p class="text-lg md:text-xl text-gray-700 max-w-4xl mx-auto">
                Unsere erfahrenen Techniker sind echte Profis in diesen Dienstleistungen
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Service Card 1: Rohr- und Kanalreinigung -->
            <div class="service-card bg-white p-8 text-center hover:shadow-lg transition-all duration-300 animate-fade-in-up">
                <div class="mb-6 flex justify-center">
                    <lottie-player
                        src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/lottie/rohr-reinigung.json'); ?>"
                        background="transparent"
                        speed="1"
                        style="width: 200px; height: 200px;"
                        loop
                        autoplay>
                    </lottie-player>
                </div>
                <h3 class="text-xl md:text-2xl font-bold mb-4 text-gray-900">Rohr- und Kanalreinigung</h3>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Ablagerungen führen schnell zu Rückstau oder Geruchsbelästigung. Wir reinigen Rohre und Abläufe gründlich – bevor es kritisch wird.
                </p>
                <div class="space-y-2">
                    <a href="/rohrreinigung" class="text-its-blue hover:text-its-blue-dark font-semibold inline-flex items-center">
                        zu Rohrreinigung →
                    </a>
                    <br>
                    <a href="/kanalreinigung" class="text-its-blue hover:text-its-blue-dark font-semibold inline-flex items-center">
                        zu Kanalreinigung →
                    </a>
                </div>
            </div>

            <!-- Service Card 2: Kanalinspektion -->
            <div class="service-card bg-white p-8 text-center hover:shadow-lg transition-all duration-300 animate-fade-in-up" style="animation-delay: 0.1s;">
                <div class="mb-6 flex justify-center">
                    <lottie-player
                        src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/lottie/kanalinspektion.json'); ?>"
                        background="transparent"
                        speed="1"
                        style="width: 200px; height: 200px;"
                        loop
                        autoplay>
                    </lottie-player>
                </div>
                <h3 class="text-xl md:text-2xl font-bold mb-4 text-gray-900">Kanalinspektion</h3>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Unentdeckte Schäden verursachen Undichtigkeiten und hohe Kosten. Mit TV-Inspektion und Dichtheitsprüfung erkennen und dokumentieren wir Mängel frühzeitig.
                </p>
                <a href="/kanalinspektion" class="text-its-blue hover:text-its-blue-dark font-semibold inline-flex items-center">
                    zu Kanalinspektion →
                </a>
            </div>

            <!-- Service Card 3: Kanalsanierung -->
            <div class="service-card bg-white p-8 text-center hover:shadow-lg transition-all duration-300 animate-fade-in-up" style="animation-delay: 0.2s;">
                <div class="mb-6 flex justify-center">
                    <lottie-player
                        src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/lottie/kanalsanierung.json'); ?>"
                        background="transparent"
                        speed="1"
                        style="width: 200px; height: 200px;"
                        loop
                        autoplay>
                    </lottie-player>
                </div>
                <h3 class="text-xl md:text-2xl font-bold mb-4 text-gray-900">Kanalsanierung</h3>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Risse, Wurzeleinwuchs oder undichte Stellen gefährden Infrastruktur und Umwelt. Wir sanieren grabenlos und dauerhaft – schnell, sauber und ohne Baustelle.
                </p>
                <a href="/kanalsanierung" class="text-its-blue hover:text-its-blue-dark font-semibold inline-flex items-center">
                    zu Kanalsanierung →
                </a>
            </div>

            <!-- Service Card 4: Flächenreinigung -->
            <div class="service-card bg-white p-8 text-center hover:shadow-lg transition-all duration-300 animate-fade-in-up" style="animation-delay: 0.3s;">
                <div class="mb-6 flex justify-center">
                    <lottie-player
                        src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/lottie/flaechenreinigung.json'); ?>"
                        background="transparent"
                        speed="1"
                        style="width: 200px; height: 200px;"
                        loop
                        autoplay>
                    </lottie-player>
                </div>
                <h3 class="text-xl md:text-2xl font-bold mb-4 text-gray-900">Flächenreinigung</h3>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Ungepflegte Flächen werden rutschig und unansehnlich. Unsere Spezialfahrzeuge reinigen effizient und schonend – für Sicherheit und Werterhalt.
                </p>
                <a href="/flaechenreinigung" class="text-its-blue hover:text-its-blue-dark font-semibold inline-flex items-center">
                    zu Flächenreinigung →
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Company Mission Section -->
<section class="mission-section section-padding bg-gradient-to-br from-gray-50 to-gray-100">
    <div class="container-custom">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="fade-in-on-scroll">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/mood-1.webp'); ?>"
                     alt="iTS KANAL Team"
                     class="rounded-lg shadow-xl w-full h-auto">
            </div>
            <div class="fade-in-on-scroll">
                <h2 class="text-3xl md:text-4xl font-bold text-its-blue mb-6">
                    Europas führender Anbieter von Wasserinfrastrukturlösungen
                </h2>
                <p class="text-lg text-gray-700 mb-6">
                    Mit über 50 Jahren Erfahrung und mehr als 1.000 hochqualifizierten Mitarbeitern sind wir Ihr zuverlässiger Partner für alle Aufgaben rund um Wasser-, Kanal- und Rohrsysteme.
                </p>
                <p class="text-lg text-gray-700 mb-6">
                    Unsere Mission ist es, nachhaltige und innovative Lösungen anzubieten, die die Infrastruktur unserer Kunden langfristig sichern und optimieren.
                </p>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-its-blue mr-3 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-gray-700">Zertifizierte Fachkräfte mit langjähriger Erfahrung</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-its-blue mr-3 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-gray-700">Modernste Technologie und Ausrüstung</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 text-its-blue mr-3 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-gray-700">Umweltfreundliche und nachhaltige Lösungen</span>
                    </li>
                </ul>
                <a href="#" class="btn-primary">Mehr über uns</a>
            </div>
        </div>
    </div>
</section>

<!-- 24/7 Emergency Service Section -->
<section class="emergency-section section-padding bg-its-blue text-white relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0 bg-gradient-to-r from-its-blue-dark to-its-blue-light"></div>
    </div>
    <div class="container-custom relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            <div class="flex justify-center mb-6">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/icon-24h.svg'); ?>"
                     alt="24/7 Service"
                     class="w-24 h-24 brightness-0 invert">
            </div>
            <h2 class="text-3xl md:text-4xl font-bold mb-6">24/7 Notfall-Service</h2>
            <p class="text-xl mb-8 text-gray-100">
                Wir sind rund um die Uhr für Sie da. Bei Notfällen erreichen Sie uns jederzeit unter unserer Hotline.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-10">
                <div class="bg-white bg-opacity-10 rounded-lg p-6 backdrop-blur-sm">
                    <div class="text-4xl font-bold mb-2">24/7</div>
                    <div class="text-gray-200">Verfügbarkeit</div>
                </div>
                <div class="bg-white bg-opacity-10 rounded-lg p-6 backdrop-blur-sm">
                    <div class="text-4xl font-bold mb-2">&lt; 60 min</div>
                    <div class="text-gray-200">Reaktionszeit</div>
                </div>
                <div class="bg-white bg-opacity-10 rounded-lg p-6 backdrop-blur-sm">
                    <div class="text-4xl font-bold mb-2">1.000+</div>
                    <div class="text-gray-200">Fachkräfte</div>
                </div>
            </div>
            <a href="tel:+41563000078" class="bg-white text-its-blue hover:bg-gray-100 font-bold text-2xl py-4 px-10 rounded-lg transition-all duration-300 inline-block">
                📞 056 300 00 78
            </a>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials-section section-padding bg-white">
    <div class="container-custom">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-its-blue mb-4">Das sagen unsere Kunden</h2>
            <p class="text-xl text-gray-600">Vertrauen Sie auf die Erfahrungen zufriedener Kunden</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="testimonial-card bg-gray-50 rounded-lg p-8 fade-in-on-scroll">
                <div class="flex mb-4">
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                </div>
                <p class="text-gray-700 mb-4">
                    "Schneller und professioneller Service! Das Team von iTS KANAL hat unser Kanalproblem innerhalb kürzester Zeit gelöst. Absolut empfehlenswert!"
                </p>
                <div class="font-semibold text-its-blue">Max Mustermann</div>
                <div class="text-sm text-gray-500">Hauseigentümer, Zürich</div>
            </div>

            <div class="testimonial-card bg-gray-50 rounded-lg p-8 fade-in-on-scroll">
                <div class="flex mb-4">
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                </div>
                <p class="text-gray-700 mb-4">
                    "Die TV-Inspektion hat versteckte Schäden aufgedeckt, die wir sonst nie gefunden hätten. Dank der grabenlosen Sanierung konnten wir viel Geld sparen!"
                </p>
                <div class="font-semibold text-its-blue">Anna Schmidt</div>
                <div class="text-sm text-gray-500">Verwalterin, Bern</div>
            </div>

            <div class="testimonial-card bg-gray-50 rounded-lg p-8 fade-in-on-scroll">
                <div class="flex mb-4">
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                </div>
                <p class="text-gray-700 mb-4">
                    "Zuverlässig, pünktlich und fair. Wir arbeiten seit Jahren mit iTS KANAL zusammen und sind sehr zufrieden mit der Qualität und dem Service."
                </p>
                <div class="font-semibold text-its-blue">Peter Müller</div>
                <div class="text-sm text-gray-500">Facility Manager, Basel</div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form Section -->
<section id="contact-form" class="contact-section section-padding bg-gradient-to-br from-gray-50 to-gray-100">
    <div class="container-custom">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-its-blue mb-4">Kontaktieren Sie uns</h2>
                <p class="text-xl text-gray-600">Wir freuen uns auf Ihre Anfrage und beraten Sie gerne!</p>
            </div>

            <div class="bg-white rounded-lg shadow-xl p-8 md:p-12">
                <form class="contact-form space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Name *</label>
                            <input type="text" id="name" name="name" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-its-blue focus:border-transparent outline-none transition">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">E-Mail *</label>
                            <input type="email" id="email" name="email" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-its-blue focus:border-transparent outline-none transition">
                        </div>
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">Telefon</label>
                        <input type="tel" id="phone" name="phone"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-its-blue focus:border-transparent outline-none transition">
                    </div>

                    <div>
                        <label for="subject" class="block text-sm font-semibold text-gray-700 mb-2">Betreff *</label>
                        <select id="subject" name="subject" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-its-blue focus:border-transparent outline-none transition">
                            <option value="">Bitte wählen...</option>
                            <option value="rohrreinigung">Rohrreinigung</option>
                            <option value="kanalinspektion">Kanalinspektion</option>
                            <option value="kanalsanierung">Kanalsanierung</option>
                            <option value="flaechenreinigung">Flächenreinigung</option>
                            <option value="notfall">Notfall</option>
                            <option value="sonstiges">Sonstiges</option>
                        </select>
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">Nachricht *</label>
                        <textarea id="message" name="message" rows="6" required
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-its-blue focus:border-transparent outline-none transition"></textarea>
                    </div>

                    <div class="flex items-start">
                        <input type="checkbox" id="privacy" name="privacy" required
                               class="mt-1 mr-3 w-4 h-4 text-its-blue border-gray-300 rounded focus:ring-its-blue">
                        <label for="privacy" class="text-sm text-gray-600">
                            Ich habe die <a href="#" class="text-its-blue hover:underline">Datenschutzerklärung</a> gelesen und akzeptiere diese. *
                        </label>
                    </div>

                    <button type="submit" class="btn-primary w-full md:w-auto">
                        Nachricht senden
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
