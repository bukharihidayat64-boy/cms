<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Admin Login | RinjaniTrail.id</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Hanken+Grotesk:wght@600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#000608',
                        'primary-container': '#002229',
                        secondary: '#3b6470',
                        'secondary-fixed': '#beeaf8',
                        surface: '#faf9f9',
                        accent: '#c8e8f1',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        headline: ['Hanken Grotesk', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        
        /* Background dengan gambar gunung */
        .mountain-bg {
            background: linear-gradient(135deg, #001a1f 0%, #002229 50%, #003340 100%);
            position: relative;
            overflow: hidden;
        }
        
        /* Animated gradient overlay */
        .mountain-bg::before {
            content: '';
            position: absolute;
            inset: 0;
            background: 
                radial-gradient(circle at 20% 50%, rgba(190, 234, 248, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(59, 100, 112, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 50% 80%, rgba(200, 232, 241, 0.1) 0%, transparent 50%);
            animation: gradientShift 15s ease infinite;
            background-size: 200% 200%;
        }
        
        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        /* Mountain silhouette SVG */
        .mountain-silhouette {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 40%;
            opacity: 0.15;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 400'%3E%3Cpath fill='%23beeaf8' d='M0,400 L0,280 L120,220 L240,260 L360,180 L480,220 L600,140 L720,180 L840,100 L960,160 L1080,80 L1200,140 L1320,100 L1440,160 L1440,400 Z'/%3E%3Cpath fill='%233b6470' opacity='0.5' d='M0,400 L0,320 L180,280 L360,300 L540,240 L720,280 L900,220 L1080,260 L1260,200 L1440,240 L1440,400 Z'/%3E%3C/svg%3E");
            background-size: cover;
            background-position: bottom;
            animation: mountainFloat 20s ease-in-out infinite;
        }
        
        @keyframes mountainFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        
        /* Animated stars/particles */
        .star {
            position: absolute;
            background: white;
            border-radius: 50%;
            animation: twinkle 3s ease-in-out infinite;
        }
        
        @keyframes twinkle {
            0%, 100% { opacity: 0.2; transform: scale(1); }
            50% { opacity: 1; transform: scale(1.2); }
        }
        
        /* Floating clouds */
        .cloud {
            position: absolute;
            background: rgba(190, 234, 248, 0.08);
            border-radius: 100px;
            filter: blur(20px);
            animation: cloudFloat 30s linear infinite;
        }
        
        @keyframes cloudFloat {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100vw); }
        }
        
        /* Login card glassmorphism */
        .login-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 
                0 25px 50px -12px rgba(0, 0, 0, 0.5),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            animation: cardEntrance 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        @keyframes cardEntrance {
            from {
                opacity: 0;
                transform: translateY(30px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
        
        /* Logo animation */
        .logo-container {
            animation: logoFloat 3s ease-in-out infinite;
        }
        
        @keyframes logoFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }
        
        .logo-icon {
            background: linear-gradient(135deg, #beeaf8 0%, #3b6470 100%);
            box-shadow: 
                0 10px 30px rgba(190, 234, 248, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.3);
            animation: logoPulse 2s ease-in-out infinite;
        }
        
        @keyframes logoPulse {
            0%, 100% { box-shadow: 0 10px 30px rgba(190, 234, 248, 0.3), inset 0 1px 0 rgba(255, 255, 255, 0.3); }
            50% { box-shadow: 0 15px 40px rgba(190, 234, 248, 0.5), inset 0 1px 0 rgba(255, 255, 255, 0.3); }
        }
        
        /* Input field animations */
        .input-group {
            position: relative;
            transition: all 0.3s ease;
        }
        
        .input-field {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.15);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .input-field:focus {
            background: rgba(255, 255, 255, 0.12);
            border-color: #beeaf8;
            box-shadow: 0 0 0 3px rgba(190, 234, 248, 0.15);
            transform: translateY(-2px);
        }
        
        .input-icon {
            transition: all 0.3s ease;
        }
        
        .input-field:focus + .input-icon,
        .input-field:focus ~ .input-icon {
            color: #beeaf8;
            transform: scale(1.1);
        }
        
        /* Submit button with shine effect */
        .submit-btn {
            background: linear-gradient(135deg, #beeaf8 0%, #3b6470 100%);
            position: relative;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.6s ease;
        }
        
        .submit-btn:hover::before {
            left: 100%;
        }
        
        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(190, 234, 248, 0.4);
        }
        
        .submit-btn:active {
            transform: translateY(-1px);
        }
        
        /* Link hover effects */
        .link-hover {
            position: relative;
            transition: color 0.3s ease;
        }
        
        .link-hover::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 1px;
            background: #beeaf8;
            transition: width 0.3s ease;
        }
        
        .link-hover:hover::after {
            width: 100%;
        }
        
        /* Fade in animations */
        .fade-in-1 { animation: fadeInUp 0.6s ease 0.1s backwards; }
        .fade-in-2 { animation: fadeInUp 0.6s ease 0.2s backwards; }
        .fade-in-3 { animation: fadeInUp 0.6s ease 0.3s backwards; }
        .fade-in-4 { animation: fadeInUp 0.6s ease 0.4s backwards; }
        .fade-in-5 { animation: fadeInUp 0.6s ease 0.5s backwards; }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Checkbox custom */
        .custom-checkbox {
            appearance: none;
            width: 18px;
            height: 18px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 4px;
            background: rgba(255, 255, 255, 0.05);
            cursor: pointer;
            position: relative;
            transition: all 0.2s ease;
        }
        
        .custom-checkbox:checked {
            background: #beeaf8;
            border-color: #beeaf8;
        }
        
        .custom-checkbox:checked::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #002229;
            font-size: 12px;
            font-weight: bold;
        }
        
        /* Quote animation */
        .quote-text {
            font-style: italic;
            opacity: 0.6;
            animation: quoteFade 4s ease-in-out infinite;
        }
        
        @keyframes quoteFade {
            0%, 100% { opacity: 0.4; }
            50% { opacity: 0.7; }
        }
        /* Toggle Password Button - More Visible */
 
    </style>
</head>
<body class="font-sans min-h-screen flex items-center justify-center p-4 md:p-6">

<div class="mountain-bg w-full min-h-screen flex items-center justify-center relative">
    
    <!-- Animated stars -->
    <div class="star" style="width: 2px; height: 2px; top: 15%; left: 10%; animation-delay: 0s;"></div>
    <div class="star" style="width: 3px; height: 3px; top: 25%; left: 85%; animation-delay: 0.5s;"></div>
    <div class="star" style="width: 2px; height: 2px; top: 40%; left: 20%; animation-delay: 1s;"></div>
    <div class="star" style="width: 2px; height: 2px; top: 60%; left: 75%; animation-delay: 1.5s;"></div>
    <div class="star" style="width: 3px; height: 3px; top: 10%; left: 50%; animation-delay: 2s;"></div>
    <div class="star" style="width: 2px; height: 2px; top: 70%; left: 30%; animation-delay: 2.5s;"></div>
    <div class="star" style="width: 2px; height: 2px; top: 35%; left: 65%; animation-delay: 0.8s;"></div>
    <div class="star" style="width: 3px; height: 3px; top: 80%; left: 90%; animation-delay: 1.2s;"></div>
    
    <!-- Floating clouds -->
    <div class="cloud" style="width: 200px; height: 60px; top: 20%; animation-duration: 35s;"></div>
    <div class="cloud" style="width: 150px; height: 45px; top: 50%; animation-duration: 45s; animation-delay: -10s;"></div>
    <div class="cloud" style="width: 180px; height: 50px; top: 70%; animation-duration: 40s; animation-delay: -20s;"></div>
    
    <!-- Mountain silhouette -->
    <div class="mountain-silhouette"></div>
    
    <!-- Login Card -->
    <div class="login-card w-full max-w-md rounded-3xl p-8 md:p-10 relative z-10">
        
        <!-- Logo Section -->
        <div class="text-center mb-8 fade-in-1">
            <div class="logo-container inline-block mb-4">
                <div class="logo-icon w-20 h-20 rounded-2xl flex items-center justify-center mx-auto">
                    <svg class="w-12 h-12 text-primary-container" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M14 6l-3.75 5 2.85 3.8-1.6 1.2C9.81 13.75 7 10 7 10l-6 8h22L14 6z"/>
                    </svg>
                </div>
            </div>
            <h1 class="font-headline text-3xl font-bold text-white mb-2">Admin Panel</h1>
            <p class="text-secondary-fixed text-sm font-medium">RinjaniTrail.id CMS</p>
        </div>
        
        <!-- Quote -->
        <div class="text-center mb-6 fade-in-2">
            <p class="quote-text text-white/70 text-xs">"Setiap pendakian dimulai dengan satu langkah"</p>
        </div>
        
        <!-- Error Messages -->
        @if($errors->any())
            <div class="mb-6 p-4 bg-red-500/10 border border-red-500/30 rounded-xl flex items-start gap-3 fade-in-3 backdrop-blur-sm">
                <span class="material-symbols-outlined text-red-400 text-[20px] flex-shrink-0">error</span>
                <div class="flex-1">
                    <p class="text-red-300 font-semibold text-sm">Login Gagal</p>
                    <ul class="text-xs text-red-200/80 mt-1 space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        
        <!-- Login Form -->
        <form action="{{ route('admin.login') }}" method="POST" class="space-y-5">
            @csrf
            
            <!-- Email -->
            <div class="fade-in-3">
                <label class="block text-white/70 text-xs font-medium mb-2 uppercase tracking-wider">Email Address</label>
                <div class="input-group">
                    <span class="material-symbols-outlined input-icon absolute left-4 top-1/2 -translate-y-1/2 text-white/50 text-[20px]">mail</span>
                    <input type="email" 
                           name="email" 
                           value="{{ old('email') }}"
                           required 
                           autofocus
                           class="input-field w-full pl-12 pr-4 py-3.5 rounded-xl text-white placeholder:text-white/30 outline-none"
                           placeholder="admin@rinjanitrail.id">
                </div>
            </div>
            
            <!-- Password with Show/Hide Toggle -->
            <div class="fade-in-4">
                <label class="block text-white/70 text-xs font-medium mb-2 uppercase tracking-wider">Password</label>
                <div class="input-group">
                    <span class="material-symbols-outlined input-icon absolute left-4 top-1/2 -translate-y-1/2 text-white/50 text-[20px]">lock</span>
                    <input type="password" 
                           id="password-input"
                           name="password" 
                           required
                           class="input-field w-full pl-12 pr-12 py-3.5 rounded-xl text-white placeholder:text-white/30 outline-none"
                           placeholder="••••••••">
                    <button type="button" 
                            id="toggle-password" 
                            class="absolute right-3 top-1/2 -translate-y-1/2 focus:outline-none z-10"
                            title="Show/Hide Password">
                       <span class="material-symbols-outlined text-[22px]" id="eye-icon">visibility</span>
                    </button>
                </div>
            </div>
            
            <!-- Remember & Forgot -->
            <div class="flex items-center justify-between fade-in-4">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="remember" class="custom-checkbox">
                    <span class="text-white/70 text-sm">Remember me</span>
                </label>
                <a href="#" class="link-hover text-secondary-fixed text-sm font-medium">Forgot password?</a>
            </div>
            
            <!-- Submit Button -->
            <button type="submit" 
                    class="submit-btn w-full text-primary-container py-4 rounded-xl font-semibold text-sm uppercase tracking-wider flex items-center justify-center gap-2 fade-in-5">
                <span class="material-symbols-outlined text-[20px]">login</span>
                Sign In to Dashboard
            </button>
            
        </form>
        
        <!-- Divider -->
            <!-- OAuth Buttons (Google/Facebook) -->
            <div class="mt-6 fade-in-4">
                <div class="grid grid-cols-2 gap-3">
                    <a href="{{ route('admin.login.google') }}" class="submit-btn w-full text-primary-container py-3.5 rounded-xl font-semibold text-sm uppercase tracking-wider flex items-center justify-center gap-2" title="Login with Google">
                        <img alt="Google" class="w-5 h-5" src="{{ asset('image/Google.jpg') }}">
                        <span>Google</span>
                    </a>
                    <a href="{{ route('admin.login.facebook') }}" class="bg-white/10 hover:bg-white/15 border border-white/15 w-full text-white py-3.5 rounded-xl font-semibold text-sm uppercase tracking-wider flex items-center justify-center gap-2" title="Login with Facebook">
                        <svg class="w-5 h-5" fill="#1877F2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"></path>
                        </svg>
                        <span>Facebook</span>
                    </a>
                </div>
            </div>
            
            <div class="relative my-6 fade-in-5">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-white/10"></div>
                </div>
                <div class="relative flex justify-center text-xs">
                    <span class="bg-transparent px-4 text-white/40">Secure Access</span>
                </div>
            </div>

        
        <!-- Back to Website -->
        <div class="text-center fade-in-5">
            <a href="{{ route('home') }}" class="link-hover inline-flex items-center gap-2 text-white/60 hover:text-secondary-fixed text-sm font-medium transition-colors">
                <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                Back to Website
            </a>
        </div>
        
    </div>
    
    <!-- Footer -->
    <div class="absolute bottom-6 left-0 right-0 text-center fade-in-5">
        <p class="text-white/40 text-xs">
            © 2024 RinjaniTrail.id Admin Panel • Secure Access Only
        </p>
    </div>
    
</div>

<script>
    // Hindari halaman login di-load dari cache browser (bisa menyebabkan CSRF token expired)
    window.addEventListener('pageshow', function (event) {
        if (event.persisted) {
            window.location.reload();
        }
    });

    // Add subtle parallax effect on mouse move
    document.addEventListener('mousemove', (e) => {
        const card = document.querySelector('.login-card');
        const x = (window.innerWidth / 2 - e.pageX) / 50;
        const y = (window.innerHeight / 2 - e.pageY) / 50;
        card.style.transform = `translate(${x}px, ${y}px)`;
    });
    
    // Input focus animation
    document.querySelectorAll('.input-field').forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });
        input.addEventListener('blur', function() {
            this.parentElement.classList.remove('focused');
        });
    });

// Toggle Password Visibility
const toggleBtn = document.getElementById('toggle-password');
const passwordInput = document.getElementById('password-input');
const eyeIcon = document.getElementById('eye-icon');

if (toggleBtn && passwordInput) {
    toggleBtn.addEventListener('click', () => {
        const isPassword = passwordInput.type === 'password';
        
        // Toggle type
        passwordInput.type = isPassword ? 'text' : 'password';
        
        // Toggle icon with smooth animation
        eyeIcon.style.transition = 'all 0.3s ease';
        eyeIcon.style.transform = 'scale(0.3) rotate(180deg)';
        eyeIcon.style.opacity = '0';
        
        setTimeout(() => {
            eyeIcon.textContent = isPassword ? 'visibility_off' : 'visibility';
            eyeIcon.style.transform = 'scale(1) rotate(0deg)';
            eyeIcon.style.opacity = '1';
        }, 200);
    });
}
</script>

</body>
</html>