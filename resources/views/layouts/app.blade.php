<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>DPMPTSP Jawa Timur - Sistem Tracking Dokumen</title>

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#0C3C78',
                        secondary: '#0F9D58',
                        accent: '#FFC107',
                        darkblue: '#092954',
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-20px)' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
            background: linear-gradient(to bottom, #f0f7ff, #ffffff);
        }

        .hero-bg {
            background: linear-gradient(120deg, rgba(12, 60, 120, 0.9) 0%, rgba(9, 41, 84, 0.95) 100%),
                        url('/assets/bg-pattern.svg');
            background-size: cover;
            background-position: center;
            position: relative;
            overflow: hidden;
        }

        .hero-bg::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('/assets/dots-pattern.png') repeat;
            opacity: 0.15;
            z-index: 0;
        }

        .floating {
            animation: float 6s ease-in-out infinite;
        }

        .pulse-slow {
            animation: pulse-slow 4s infinite;
        }

        .card-hover {
            transition: all 0.3s ease;
            transform: translateY(0);
        }

        .card-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .timeline-dot {
            position: relative;
            z-index: 1;
        }

        .timeline-dot::after {
            content: '';
            position: absolute;
            width: 12px;
            height: 12px;
            background: #0F9D58;
            border-radius: 50%;
            top: 5px;
            left: -26px;
            z-index: 2;
        }

        .wave-divider {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
            transform: rotate(180deg);
        }

        .wave-divider svg {
            position: relative;
            display: block;
            width: calc(100% + 1.3px);
            height: 120px;
        }

        .wave-divider .shape-fill {
            fill: #FFFFFF;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">
    <div id="app">

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollTrigger.min.js"></script>
    <script>
        // GSAP Animations
        document.addEventListener('DOMContentLoaded', function() {
            // Animate on scroll
            gsap.registerPlugin(ScrollTrigger);

            // Hero section animations
            gsap.from('.hero-content', {
                duration: 1,
                y: 50,
                opacity: 0,
                stagger: 0.3,
                ease: "power3.out"
            });

            // Features animation
            gsap.utils.toArray('.feature-card').forEach((card, i) => {
                gsap.from(card, {
                    scrollTrigger: {
                        trigger: card,
                        start: "top 80%",
                    },
                    duration: 0.8,
                    y: 30,
                    opacity: 0,
                    delay: i * 0.2,
                    ease: "back.out(1.7)"
                });
            });

            // Stats counter
            const counters = document.querySelectorAll('.counter');
            counters.forEach(counter => {
                const target = +counter.getAttribute('data-target');
                const duration = 2000;
                const increment = target / (duration / 16);

                let current = 0;

                const updateCounter = () => {
                    current += increment;
                    if (current < target) {
                        counter.innerText = Math.ceil(current);
                        requestAnimationFrame(updateCounter);
                    } else {
                        counter.innerText = target;
                    }
                };

                ScrollTrigger.create({
                    trigger: counter,
                    start: "top 80%",
                    onEnter: updateCounter,
                    once: true
                });
            });

            // Floating elements
            gsap.to('.floating-1', {
                y: -20,
                duration: 3,
                repeat: -1,
                yoyo: true,
                ease: "sine.inOut"
            });

            gsap.to('.floating-2', {
                y: -15,
                duration: 3.5,
                repeat: -1,
                yoyo: true,
                ease: "sine.inOut",
                delay: 0.5
            });
        });
    </script>
</body>
</html>
