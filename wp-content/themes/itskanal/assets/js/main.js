/**
 * Main JavaScript for iTS KANAL Theme
 */

(function() {
    'use strict';

    // Mobile Menu Toggle
    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuToggle && mobileMenu) {
        mobileMenuToggle.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');

            // Update aria-expanded
            const isExpanded = !mobileMenu.classList.contains('hidden');
            mobileMenuToggle.setAttribute('aria-expanded', isExpanded);
        });
    }

    // Appointment Modal
    const appointmentBtn = document.getElementById('appointment-btn');
    const appointmentBtnHero = document.getElementById('appointment-btn-hero');
    const appointmentModal = document.getElementById('appointment-modal');
    const closeModal = document.getElementById('close-modal');
    const goToContact = document.getElementById('go-to-contact');

    // Function to open modal
    function openAppointmentModal() {
        if (appointmentModal) {
            appointmentModal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
    }

    // Bind to both appointment buttons
    if (appointmentBtn) {
        appointmentBtn.addEventListener('click', openAppointmentModal);
    }

    if (appointmentBtnHero) {
        appointmentBtnHero.addEventListener('click', openAppointmentModal);
    }

    if (closeModal && appointmentModal) {
        closeModal.addEventListener('click', function() {
            appointmentModal.classList.add('hidden');
            document.body.style.overflow = '';
        });
    }

    // Close modal on background click
    if (appointmentModal) {
        appointmentModal.addEventListener('click', function(e) {
            if (e.target === appointmentModal) {
                appointmentModal.classList.add('hidden');
                document.body.style.overflow = '';
            }
        });
    }

    // Go to contact form
    if (goToContact) {
        goToContact.addEventListener('click', function(e) {
            e.preventDefault();
            appointmentModal.classList.add('hidden');
            document.body.style.overflow = '';

            const contactForm = document.getElementById('contact-form');
            if (contactForm) {
                contactForm.scrollIntoView({ behavior: 'smooth' });
            }
        });
    }

    // Sticky Header Enhancement
    let lastScroll = 0;
    const header = document.getElementById('masthead');

    if (header) {
        window.addEventListener('scroll', function() {
            const currentScroll = window.pageYOffset;

            if (currentScroll > 100) {
                header.classList.add('shadow-lg');
            } else {
                header.classList.remove('shadow-lg');
            }

            lastScroll = currentScroll;
        });
    }

    // Intersection Observer for Fade-in Animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe all elements with fade-in class
    document.querySelectorAll('.fade-in-on-scroll').forEach(el => {
        observer.observe(el);
    });

    // Service Cards Animation on Scroll
    const serviceObserver = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Add animation class when card is visible
                entry.target.style.animation = entry.target.style.animation || 'fadeInUp 0.8s ease-out forwards';
                serviceObserver.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.15,
        rootMargin: '0px 0px -80px 0px'
    });

    // Observe all service cards
    document.querySelectorAll('.service-card').forEach(card => {
        serviceObserver.observe(card);
    });

    // Smooth Scroll for Anchor Links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href !== '#' && href !== '') {
                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });

    // Form Validation
    const contactForms = document.querySelectorAll('.contact-form');

    contactForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            let isValid = true;
            const requiredFields = form.querySelectorAll('[required]');

            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.classList.add('border-red-500');

                    // Show error message
                    let errorMsg = field.nextElementSibling;
                    if (!errorMsg || !errorMsg.classList.contains('error-message')) {
                        errorMsg = document.createElement('span');
                        errorMsg.className = 'error-message text-red-500 text-sm mt-1 block';
                        errorMsg.textContent = 'Dieses Feld ist erforderlich';
                        field.parentNode.insertBefore(errorMsg, field.nextSibling);
                    }
                } else {
                    field.classList.remove('border-red-500');
                    const errorMsg = field.nextElementSibling;
                    if (errorMsg && errorMsg.classList.contains('error-message')) {
                        errorMsg.remove();
                    }
                }
            });

            if (!isValid) {
                e.preventDefault();
            }
        });

        // Remove error on input
        const inputs = form.querySelectorAll('[required]');
        inputs.forEach(input => {
            input.addEventListener('input', function() {
                this.classList.remove('border-red-500');
                const errorMsg = this.nextElementSibling;
                if (errorMsg && errorMsg.classList.contains('error-message')) {
                    errorMsg.remove();
                }
            });
        });
    });

    // Lazy Loading Images Enhancement
    if ('loading' in HTMLImageElement.prototype) {
        const images = document.querySelectorAll('img[loading="lazy"]');
        images.forEach(img => {
            img.src = img.dataset.src || img.src;
        });
    } else {
        // Fallback for browsers that don't support lazy loading
        const script = document.createElement('script');
        script.src = 'https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js';
        document.body.appendChild(script);
    }

    // Close mobile menu on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.add('hidden');
            }
            if (appointmentModal && !appointmentModal.classList.contains('hidden')) {
                appointmentModal.classList.add('hidden');
                document.body.style.overflow = '';
            }
        }
    });

})();
