<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Authentication | RinjaniTrail.id</title>
    
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    
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
    
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        
        .glass-panel {
            background: rgba(0, 34, 41, 0.8);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .slide-up {
            animation: slideUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        
        @keyframes slideUp {
            from { transform: translateY(40px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        
        .particle {
            position: absolute;
            background: white;
            border-radius: 50%;
            pointer-events: none;
            opacity: 0.3;
        }
        
        /* Sembunyikan icon mata bawaan browser */
        input[type="password"]::-ms-reveal,
        input[type="password"]::-ms-clear,
        input[type="password"]::-webkit-credentials-auto-fill-button,
        input[type="password"]::-webkit-caps-lock-indicator,
        input[type="password"]::-webkit-textfield-decoration-container {
            display: none !important;
            visibility: hidden !important;
            opacity: 0 !important;
            pointer-events: none !important;
        }
        
        input::-webkit-credentials-auto-fill-button {
            display: none !important;
        }
    </style>
</head>
<body class="bg-primary text-on-primary min-h-screen overflow-x-hidden">

<!-- Cinematic Background -->
<div class="fixed inset-0 z-0">
    <div class="absolute inset-0 bg-gradient-to-b from-primary/60 via-transparent to-primary z-10"></div>
    <img alt="Cinematic Rinjani" 
         class="w-full h-full object-cover" 
         src="{{ asset('image/login.jpeg') }}">
    <div class="absolute inset-0 z-20" id="particle-container"></div>
</div>

<!-- Main Canvas -->
<main class="relative z-30 flex items-center justify-center min-h-screen px-md py-lg">
    
    <!-- Login Card -->
    <section class="w-full max-w-[480px] slide-up" id="login-section">
        <div class="glass-panel p-lg rounded-xl shadow-2xl">
            <!-- Brand Anchor -->
            <div class="flex flex-col items-center mb-lg">
                <div class="mb-sm text-surface font-headline-md text-headline-md font-bold tracking-tight">
                    RinjaniTrail.id
                </div>
                <h1 class="font-headline-sm text-headline-sm text-on-primary">Welcome Back Explorer</h1>
                <p class="font-body-md text-body-md text-on-primary-container mt-xs">Continue your premium alpine expedition</p>
            </div>
            
            <form id="loginForm" action="{{ route('user.login.process') }}" method="POST" class="space-y-md">
    @csrf
                <div>
                    <label class="block font-label-sm text-label-sm text-on-primary-container mb-xs">Email Address</label>
                    <div class="relative group">
                        <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-on-primary-container group-focus-within:text-secondary-fixed transition-colors">mail</span>
                        <input id="login-email" name="email" class="w-full bg-white/10 border border-white/20 rounded-lg py-3 pl-12 pr-4 text-on-primary font-body-md focus:outline-none focus:ring-2 focus:ring-secondary-fixed focus:border-transparent transition-all placeholder:text-on-primary-container/50" placeholder="name@adventure.com" type="email" required>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between items-center mb-xs">
                        <label class="block font-label-sm text-label-sm text-on-primary-container">Password</label>
                        <a class="font-label-sm text-label-sm text-secondary-fixed hover:underline" href="#">Forgot?</a>
                    </div>
                    <div class="relative group">
                        <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-on-primary-container group-focus-within:text-secondary-fixed transition-colors">lock</span>
                        <input id="login-password" name="password" class="w-full bg-white/10 border border-white/20 rounded-lg py-3 pl-12 pr-12 text-on-primary font-body-md focus:outline-none focus:ring-2 focus:ring-secondary-fixed focus:border-transparent transition-all placeholder:text-on-primary-container/50" placeholder="••••••••" type="password" required>
                        <button type="button" class="absolute right-4 top-1/2 -translate-y-1/2 text-on-primary-container hover:text-secondary-fixed transition-colors cursor-pointer flex items-center" onclick="togglePassword('login-password', this)">
                            <span class="material-symbols-outlined">visibility</span>
                        </button>
                    </div>
                </div>
                <button class="w-full bg-surface text-primary font-label-md text-label-md py-3 rounded-lg hover:scale-[1.02] active:scale-[0.98] transition-all font-bold shadow-lg" type="submit">
                    Login to Dashboard
                </button>
                <div class="relative flex items-center py-sm">
                    <div class="flex-grow border-t border-white/10"></div>
                    <span class="flex-shrink mx-4 font-label-sm text-label-sm text-on-primary-container">Or continue with</span>
                    <div class="flex-grow border-t border-white/10"></div>
                </div>
                <div class="grid grid-cols-2 gap-3">
<a href="{{ route('user.login.google') }}" class="w-full bg-white text-on-primary-fixed font-label-md text-label-md py-3 rounded-xl hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center justify-center gap-2 shadow-lg">
                        <img alt="Google" class="w-5 h-5" src="{{ asset('image/Google.jpg') }}">
                        <span>Google</span>
                    </a>
                    <a href="{{ route('user.login.facebook') }}" class="w-full bg-white text-on-primary-fixed font-label-md text-label-md py-3 rounded-xl hover:scale-[1.02] active:scale-[0.98] transition-all flex items-center justify-center gap-2 shadow-lg">
                        <svg class="w-5 h-5" fill="#1877F2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"></path>
                        </svg>
                        <span>Facebook</span>
                    </a>
                </div>
            </form>
            
            <p class="mt-lg text-center font-body-md text-body-md text-on-primary-container">
                New to the trail? 
                <button class="text-secondary-fixed font-bold hover:underline transition-all" onclick="toggleAuth('register')">Create Account</button>
            </p>
        </div>
    </section>
    
    <!-- Register Card (Hidden by default) -->
    <section class="w-full max-w-[560px] hidden" id="register-section">
        <div class="glass-panel p-lg rounded-xl shadow-2xl">
            <div class="flex flex-col items-center mb-lg">
                <div class="mb-sm text-surface font-headline-md text-headline-md font-bold tracking-tight">
                    RinjaniTrail.id
                </div>
                <h1 class="font-headline-sm text-headline-sm text-on-primary text-center">Join the Expedition</h1>
                <p class="font-body-md text-body-md text-on-primary-container mt-xs">Access professional guides and exclusive routes</p>
            </div>
            
            <form id="registerForm" action="{{ route('home') }}" method="GET" class="space-y-md">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-md">
                    <div>
                        <label class="block font-label-sm text-label-sm text-on-primary-container mb-xs">Full Name</label>
                        <input name="name" class="w-full bg-white/10 border border-white/20 rounded-lg py-3 px-4 text-on-primary font-body-md focus:outline-none focus:ring-2 focus:ring-secondary-fixed focus:border-transparent transition-all placeholder:text-on-primary-container/50" placeholder="John Doe" type="text" required>
                    </div>
                    <div>
                        <label class="block font-label-sm text-label-sm text-on-primary-container mb-xs">Email</label>
                        <input name="email" class="w-full bg-white/10 border border-white/20 rounded-lg py-3 px-4 text-on-primary font-body-md focus:outline-none focus:ring-2 focus:ring-secondary-fixed focus:border-transparent transition-all placeholder:text-on-primary-container/50" placeholder="john@example.com" type="email" required>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-md">
                    <div>
                        <label class="block font-label-sm text-label-sm text-on-primary-container mb-xs">Phone Number</label>
                        <input name="phone" class="w-full bg-white/10 border border-white/20 rounded-lg py-3 px-4 text-on-primary font-body-md focus:outline-none focus:ring-2 focus:ring-secondary-fixed focus:border-transparent transition-all placeholder:text-on-primary-container/50" placeholder="+62..." type="tel">
                    </div>
                    <div>
                        <label class="block font-label-sm text-label-sm text-on-primary-container mb-xs">Account Role</label>
                        <select name="role" class="w-full bg-white/10 border border-white/20 rounded-lg py-3 px-4 text-on-primary font-body-md focus:outline-none focus:ring-2 focus:ring-secondary-fixed focus:border-transparent transition-all appearance-none cursor-pointer">
                            <option class="bg-primary-container" value="hiker">Hiker</option>
                            <option class="bg-primary-container" value="partner">Local Partner / Guide</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label class="block font-label-sm text-label-sm text-on-primary-container mb-xs">Create Password</label>
                    <div class="relative group">
                        <input id="register-password" name="password" class="w-full bg-white/10 border border-white/20 rounded-lg py-3 px-4 text-on-primary font-body-md focus:outline-none focus:ring-2 focus:ring-secondary-fixed focus:border-transparent transition-all placeholder:text-on-primary-container/50" placeholder="Min. 8 characters" type="password" required>
                        <button type="button" class="absolute right-4 top-1/2 -translate-y-1/2 text-on-primary-container hover:text-secondary-fixed transition-colors cursor-pointer flex items-center" onclick="togglePassword('register-password', this)">
                            <span class="material-symbols-outlined">visibility</span>
                        </button>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <input class="mt-1 w-4 h-4 rounded border-white/20 bg-white/10 text-secondary-fixed focus:ring-secondary-fixed" id="terms" type="checkbox" required>
                    <label class="font-body-md text-body-md text-on-primary-container" for="terms">
                        I agree to the <a class="text-secondary-fixed underline" href="#">Terms of Service</a> and <a class="text-secondary-fixed underline" href="#">Privacy Policy</a>.
                    </label>
                </div>
                <button class="w-full bg-surface text-primary font-label-md text-label-md py-4 rounded-lg hover:scale-[1.01] active:scale-[0.98] transition-all font-bold shadow-lg mt-md" type="submit">
                    Begin My Journey
                </button>
            </form>
            
            <p class="mt-lg text-center font-body-md text-body-md text-on-primary-container">
                Already a member? 
                <button class="text-secondary-fixed font-bold hover:underline transition-all" onclick="toggleAuth('login')">Sign In</button>
            </p>
        </div>
    </section>
</main>

<!-- Simple Footer for Legal -->
<footer class="fixed bottom-0 w-full z-40 p-md pointer-events-none">
    <div class="max-w-container-max mx-auto flex justify-between items-center opacity-40">
        <span class="font-label-sm text-label-sm text-on-primary-fixed">© 2024 RinjaniTrail.id</span>
        <div class="flex gap-md pointer-events-auto">
            <a class="font-label-sm text-label-sm text-on-primary-fixed hover:text-secondary-fixed transition-colors" href="#">Safety Protocols</a>
            <a class="font-label-sm text-label-sm text-on-primary-fixed hover:text-secondary-fixed transition-colors" href="#">Support</a>
        </div>
    </div>
</footer>

<script>
// Hindari halaman login di-load dari cache browser (bisa menyebabkan CSRF token expired)
window.addEventListener('pageshow', function (event) {
    if (event.persisted) {
        window.location.reload();
    }
});

// Particle System
const container = document.getElementById('particle-container');
const particleCount = 40;

function createParticle() {
    const particle = document.createElement('div');
    particle.className = 'particle';
    
    const size = Math.random() * 3 + 1 + 'px';
    particle.style.width = size;
    particle.style.height = size;
    
    const startX = Math.random() * 100 + 'vw';
    const startY = Math.random() * 100 + 'vh';
    particle.style.left = startX;
    particle.style.top = startY;

    container.appendChild(particle);

    const duration = Math.random() * 10000 + 15000;
    const xMovement = (Math.random() - 0.5) * 100;
    const yMovement = (Math.random() - 0.5) * 100;

    particle.animate([
        { transform: 'translate(0, 0)', opacity: 0 },
        { transform: `translate(${xMovement/2}px, ${yMovement/2}px)`, opacity: 0.4, offset: 0.5 },
        { transform: `translate(${xMovement}px, ${yMovement}px)`, opacity: 0 }
    ], {
        duration: duration,
        iterations: Infinity,
        easing: 'linear'
    });
}

for (let i = 0; i < particleCount; i++) {
    createParticle();
}

// Toggle Login/Register
function toggleAuth(target) {
    const login = document.getElementById('login-section');
    const register = document.getElementById('register-section');

    if (target === 'register') {
        login.classList.add('opacity-0', '-translate-y-4');
        setTimeout(() => {
            login.classList.add('hidden');
            register.classList.remove('hidden');
            register.classList.remove('opacity-0', '-translate-y-4');
            register.classList.add('slide-up');
        }, 300);
    } else {
        register.classList.add('opacity-0', '-translate-y-4');
        setTimeout(() => {
            register.classList.add('hidden');
            login.classList.remove('hidden');
            login.classList.remove('opacity-0', '-translate-y-4');
            login.classList.add('slide-up');
        }, 300);
    }
}

// Toggle Password Visibility
function togglePassword(inputId, button) {
    const input = document.getElementById(inputId);
    const icon = button.querySelector('.material-symbols-outlined');
    
    if (input.type === 'password') {
        input.type = 'text';
        icon.textContent = 'visibility_off';
    } else {
        input.type = 'password';
        icon.textContent = 'visibility';
    }
}

// Micro-interactions for input focus
document.querySelectorAll('input').forEach(input => {
    input.addEventListener('focus', () => {
        input.closest('.relative.group')?.classList.add('scale-[1.01]');
    });
    input.addEventListener('blur', () => {
        input.closest('.relative.group')?.classList.remove('scale-[1.01]');
    });
});

// Form Login Submission - Biarkan Laravel handle
document.getElementById('loginForm').addEventListener('submit', function(e) {
    const email = document.getElementById('login-email').value;
    const password = document.getElementById('login-password').value;
    
    if (!email || !password) {
        e.preventDefault();
        alert('Please fill in all fields');
        return;
    }
    
    // Biarkan form submit secara normal ke Laravel
});

// Form Register Submission
document.getElementById('registerForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const terms = document.getElementById('terms');
    if (!terms.checked) {
        alert('Please agree to Terms of Service and Privacy Policy');
        return;
    }
    
    this.reset();
    window.location.href = '{{ route("home") }}';
});

// Auto show register form if URL has ?mode=register
document.addEventListener('DOMContentLoaded', function() {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('mode') === 'register') {
        toggleAuth('register');
    }
});
</script>

</body>
</html>