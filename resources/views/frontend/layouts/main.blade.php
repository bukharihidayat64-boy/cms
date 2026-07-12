<!DOCTYPE html>
<html class="scroll-smooth" lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', 'RinjaniTrail.id')</title>
    
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    
    <style>
        @keyframes fade-up {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-up {
            animation: fade-up 0.8s ease-out forwards;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .parallax-bg {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .cloud-container {
            pointer-events: none;
            overflow: hidden;
        }
        @keyframes float-clouds {
            from { transform: translateX(-10%); }
            to { transform: translateX(10%); }
        }
        .floating-clouds {
            animation: float-clouds 20s ease-in-out infinite alternate;
        }
        
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            vertical-align: middle;
        }
    </style>
    
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-surface-variant": "#41484a",
                        "primary-fixed-dim": "#acccd5",
                        "on-tertiary-container": "#a57e69",
                        "secondary-container": "#beeaf8",
                        "on-tertiary-fixed": "#2e1507",
                        "surface-container-lowest": "#ffffff",
                        "secondary": "#3b6470",
                        "surface-variant": "#e3e2e2",
                        "surface-dim": "#dadada",
                        "on-surface": "#1a1c1c",
                        "surface": "#faf9f9",
                        "tertiary-container": "#311809",
                        "on-primary-fixed-variant": "#2d4b53",
                        "error-container": "#ffdad6",
                        "secondary-fixed-dim": "#a3cddb",
                        "tertiary-fixed": "#ffdbca",
                        "on-tertiary": "#ffffff",
                        "tertiary-fixed-dim": "#ebbda5",
                        "error": "#ba1a1a",
                        "on-secondary": "#ffffff",
                        "inverse-primary": "#acccd5",
                        "on-error-container": "#93000a",
                        "surface-tint": "#45636b",
                        "outline": "#72787a",
                        "surface-container": "#eeeeee",
                        "surface-container-highest": "#e3e2e2",
                        "surface-bright": "#faf9f9",
                        "on-tertiary-fixed-variant": "#5f3f2e",
                        "on-primary-container": "#6c8b93",
                        "tertiary": "#0f0300",
                        "surface-container-high": "#e9e8e8",
                        "surface-container-low": "#f4f3f3",
                        "on-primary": "#ffffff",
                        "secondary-fixed": "#beeaf8",
                        "inverse-surface": "#2f3131",
                        "on-background": "#1a1c1c",
                        "on-primary-fixed": "#001f26",
                        "on-secondary-fixed": "#001f27",
                        "background": "#faf9f9",
                        "inverse-on-surface": "#f1f0f1",
                        "on-secondary-fixed-variant": "#214c58",
                        "outline-variant": "#c1c7ca",
                        "primary-container": "#002229",
                        "primary": "#000608",
                        "primary-fixed": "#c8e8f1",
                        "on-secondary-container": "#416a76",
                        "on-error": "#ffffff"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "md": "24px",
                        "container-max": "1280px",
                        "xl": "80px",
                        "sm": "16px",
                        "gutter": "24px",
                        "base": "4px",
                        "xs": "8px",
                        "lg": "48px"
                    },
                    "fontFamily": {
                        "label-md": ["Inter"],
                        "headline-sm": ["Hanken Grotesk"],
                        "headline-md": ["Hanken Grotesk"],
                        "label-sm": ["Inter"],
                        "display-lg": ["Hanken Grotesk"],
                        "display-lg-mobile": ["Hanken Grotesk"],
                        "body-lg": ["Inter"],
                        "body-md": ["Inter"]
                    },
                    "fontSize": {
                        "label-md": ["14px", {"lineHeight": "20px", "letterSpacing": "0.01em", "fontWeight": "500"}],
                        "headline-sm": ["24px", {"lineHeight": "32px", "fontWeight": "600"}],
                        "headline-md": ["32px", {"lineHeight": "40px", "fontWeight": "600"}],
                        "label-sm": ["12px", {"lineHeight": "16px", "fontWeight": "600"}],
                        "display-lg": ["48px", {"lineHeight": "56px", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                        "display-lg-mobile": ["36px", {"lineHeight": "44px", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                        "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}],
                        "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}]
                    }
                },
            },
        }
    </script>
    
    @stack('styles')
</head>
<body class="bg-background text-on-background font-body-md selection:bg-secondary-container selection:text-on-secondary-container">

<!-- Panggil Navbar -->
@include('frontend.partials.navbar')

<!-- Main Content -->
<main class="pt-20">
    @yield('content')
</main>

<!-- Panggil Footer -->
@include('frontend.partials.footer')

<script>
// Micro-interactions and Scroll Animations
document.addEventListener('DOMContentLoaded', () => {
    const observerOptions = {
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-up');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    document.querySelectorAll('section').forEach(section => {
        section.classList.add('opacity-0');
        observer.observe(section);
    });

    // Parallax Scroll Effect for Hero
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const heroBg = document.querySelector('.parallax-bg');
        if (heroBg) {
            heroBg.style.transform = `translateY(${scrolled * 0.4}px)`;
        }
        
        // Navbar scroll effect
        const nav = document.querySelector('nav');
        if (scrolled > 50) {
            nav.classList.add('py-xs');
            nav.classList.remove('py-md');
        } else {
            nav.classList.add('py-md');
            nav.classList.remove('py-xs');
        }
    });
});
</script>

@stack('scripts')

</body>
</html>