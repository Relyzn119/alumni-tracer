<!DOCTYPE html>
<html lang="id" class="dark scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SIKAK UMI') - Sistem Informasi Kemahasiswaan & Alumni</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anybody:ital,wdth,wght@0,50..150,100..900;1,50..150,100..900&family=Archivo:ital,wght@0,300..900;1,300..900&family=Martian+Mono:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- FontAwesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Bootstrap 5 CSS for utility components -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        ground: '#0B0E12',
                        surface: '#11151B',
                        'surface-elevated': '#181E26',
                        action: '#2E5E99',
                        alert: '#FF6B3D',
                        snow: '#EEF3F8',
                        line: 'rgba(238,243,248,0.14)',
                        'line-heavy': 'rgba(238,243,248,0.35)',
                    },
                    fontFamily: {
                        anybody: ['Anybody', 'sans-serif'],
                        archivo: ['Archivo', 'sans-serif'],
                        mono: ['Martian Mono', 'monospace'],
                    },
                }
            }
        }
    </script>

    <!-- Lenis Smooth Scroll -->
    <script src="https://cdn.jsdelivr.net/npm/lenis@1.1.18/dist/lenis.min.js"></script>

    <style>
        :root {
            --ground: #0B0E12;
            --surface: #11151B;
            --surface-elevated: #181E26;
            --action: #2E5E99;
            --alert: #FF6B3D;
            --snow-100: #EEF3F8;
            --line: rgba(238,243,248,.14);
        }

        body {
            background-color: var(--ground);
            color: var(--snow-100);
            font-family: 'Archivo', sans-serif;
            line-height: 1.55;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6, .font-heading {
            font-family: 'Anybody', sans-serif;
            line-height: 0.98;
        }

        .tnum {
            font-variant-numeric: tabular-nums;
            font-feature-settings: "tnum" 1;
            font-family: 'Martian Mono', monospace;
        }

        /* Cold Photographic Filter */
        .plate-filter {
            filter: saturate(1.2) contrast(1.15) brightness(0.9);
        }

        /* Custom Dropdown Overrides for Bootstrap in Dark Mode */
        .dropdown-menu-dark-kaltgrat {
            background-color: #181E26 !important;
            border: 1px solid rgba(238,243,248,0.14) !important;
            border-radius: 4px;
            padding: 8px 0;
            box-shadow: 0 10px 30px rgba(0,0,0,0.8);
        }

        .dropdown-menu-dark-kaltgrat .dropdown-item {
            color: #EEF3F8 !important;
            font-family: 'Martian Mono', monospace;
            font-size: 12px;
            padding: 8px 16px;
            transition: all 0.2s ease;
        }

        .dropdown-menu-dark-kaltgrat .dropdown-item:hover {
            background-color: rgba(46,94,153,0.2) !important;
            color: #2E5E99 !important;
        }

        /* Navbar custom styles */
        .kaltgrat-nav-link {
            font-family: 'Martian Mono', monospace;
            font-size: 12px;
            color: rgba(238,243,248,0.7) !important;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            transition: color 0.2s ease;
        }

        .kaltgrat-nav-link:hover, .kaltgrat-nav-link.active {
            color: #2E5E99 !important;
        }

        /* Intersection Observer Animations */
        .io {
            opacity: 0;
            transform: translateY(24px);
            transition: opacity 0.8s ease, transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .io.is-visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
    @stack('script-css')
    @stack('styles')
</head>

<body class="bg-ground text-snow font-archivo antialiased min-h-screen flex flex-col justify-between">

    <!-- TOP TELEMETRY BAR & NAVIGATION HEADER -->
    <header class="fixed top-0 left-0 w-full z-50 bg-ground/90 backdrop-blur-md border-b border-line px-4 lg:px-8 py-2.5">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            
            <!-- Left: Brand & Telemetry Indicator -->
            <div class="flex items-center gap-6">
                <a href="{{ route('main') }}" class="flex items-center gap-2 text-decoration-none">
                    <span class="w-3 h-3 rounded-full bg-action animate-pulse"></span>
                    <span class="font-anybody font-black text-xl sm:text-2xl tracking-tighter text-snow uppercase">SIKAK<span class="text-action">UMI</span></span>
                </a>
            </div>

            <!-- Middle: Navigation Links -->
            <nav class="hidden lg:flex items-center gap-6">
                <a class="kaltgrat-nav-link {{ request()->routeIs('main') ? 'active' : '' }}" href="{{ route('main') }}">Home</a>
                <a class="kaltgrat-nav-link {{ request()->routeIs('old-news') ? 'active' : '' }}" href="{{ route('old-news') }}">Berita</a>

                <!-- Dropdown Alumni -->
                <div class="dropdown">
                    <button class="kaltgrat-nav-link dropdown-toggle bg-transparent border-0 p-0 flex items-center gap-1 {{ request()->routeIs('pencarian*') || request()->routeIs('jejak-karir*') ? 'active' : '' }}" 
                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Alumni
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark-kaltgrat">
                        <li>
                            <a class="dropdown-item" href="{{ route('pencarian') }}">
                                <i class="fa-solid fa-users text-action me-2"></i> Data Alumni
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('jejak-karir.index') }}">
                                <i class="fa-solid fa-briefcase text-action me-2"></i> Jejak Karir Alumni
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Dropdown Gallery -->
                <div class="dropdown">
                    <button class="kaltgrat-nav-link dropdown-toggle bg-transparent border-0 p-0 flex items-center gap-1 {{ request()->routeIs('foto*') || request()->routeIs('video*') ? 'active' : '' }}" 
                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Gallery
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark-kaltgrat">
                        <li><a class="dropdown-item" href="{{ route('foto') }}"><i class="fa-solid fa-camera me-2 text-action"></i> Foto</a></li>
                        <li><a class="dropdown-item" href="{{ route('video') }}"><i class="fa-solid fa-video me-2 text-action"></i> Video</a></li>
                    </ul>
                </div>

                <a class="kaltgrat-nav-link {{ request()->routeIs('lowongan*') ? 'active' : '' }}" href="{{ route('lowongan') }}">Lowongan</a>

                <!-- Dropdown Kemahasiswaan -->
                <div class="dropdown">
                    <button class="kaltgrat-nav-link dropdown-toggle bg-transparent border-0 p-0 flex items-center gap-1" 
                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Kemahasiswaan
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark-kaltgrat">
                        <li><a class="dropdown-item" href="https://ppkpt.sikak-methodist.org" target="_blank">1. Satgas PPKPT</a></li>
                        <li><a class="dropdown-item" href="https://portalkemahasiswaan.sikak-methodist.org" target="_blank">2. UKM Kampus</a></li>
                        <li><a class="dropdown-item" href="https://konseling.sikak-methodist.org" target="_blank">3. Konseling Mahasiswa</a></li>
                    </ul>
                </div>
            </nav>

            <!-- Right: Auth Buttons & Mobile Toggler -->
            <div class="flex items-center gap-3">
                @auth
                    @if(auth()->user()->role == 'admin')
                        <a href="{{ route('admin.home') }}" class="hidden lg:inline-block bg-action text-white font-anybody font-bold text-xs uppercase px-4 py-2 tracking-wider hover:bg-action/90 transition-colors text-decoration-none">
                            Dashboard Admin
                        </a>
                    @elseif(auth()->user()->role == 'user')
                        <a href="{{ route('user.home') }}" class="hidden lg:inline-block bg-action text-white font-anybody font-bold text-xs uppercase px-4 py-2 tracking-wider hover:bg-action/90 transition-colors text-decoration-none">
                            Portal Alumni
                        </a>
                    @elseif(auth()->user()->role == 'fakultas')
                        <a href="{{ route('falkutas.home') }}" class="hidden lg:inline-block bg-action text-white font-anybody font-bold text-xs uppercase px-4 py-2 tracking-wider hover:bg-action/90 transition-colors text-decoration-none">
                            Dashboard Fakultas
                        </a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="hidden lg:inline-block border border-line text-snow font-mono text-xs uppercase px-4 py-2 hover:border-snow/50 transition-colors text-decoration-none">
                        Sign In
                    </a>
                    <a href="{{ route('register') }}" class="hidden lg:inline-block bg-action text-white font-anybody font-bold text-xs uppercase px-4 py-2 tracking-wider hover:bg-action/90 transition-colors text-decoration-none">
                        Sign Up
                    </a>
                @endauth

                <!-- Mobile Menu Button -->
                <button class="lg:hidden text-snow p-2 text-xl" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMobileNav">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- MOBILE NAVIGATION OFFCANVAS -->
    <div class="offcanvas offcanvas-end bg-surface text-snow border-l border-line" tabindex="-1" id="offcanvasMobileNav">
        <div class="offcanvas-header border-b border-line p-4">
            <h5 class="offcanvas-title font-anybody font-bold text-lg text-snow uppercase">MENU SIKAK<span class="text-action">UMI</span></h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-4 font-mono text-xs space-y-3">
            <a href="{{ route('main') }}" class="block py-2 text-snow hover:text-action uppercase text-decoration-none">Home</a>
            <a href="{{ route('old-news') }}" class="block py-2 text-snow hover:text-action uppercase text-decoration-none">Berita</a>

            <!-- Dropdown Alumni Mobile -->
            <div>
                <button class="w-full text-left py-2 flex items-center justify-between text-snow hover:text-action uppercase text-decoration-none bg-transparent border-0 font-mono text-xs p-0 cursor-pointer" 
                        type="button" 
                        onclick="toggleMobileSubmenu('mobileMenuAlumni', this)">
                    <span>ALUMNI</span>
                    <i class="fa-solid fa-chevron-down text-[10px] text-snow/60 transition-transform duration-200"></i>
                </button>
                <div id="mobileMenuAlumni" class="hidden space-y-2 pl-4 pt-2 border-l border-line ml-2 my-1">
                    <a href="{{ route('pencarian') }}" class="block py-1.5 text-snow/80 hover:text-action uppercase text-decoration-none">
                        <i class="fa-solid fa-users text-action me-2"></i> Data Alumni
                    </a>
                    <a href="{{ route('jejak-karir.index') }}" class="block py-1.5 text-snow/80 hover:text-action uppercase text-decoration-none">
                        <i class="fa-solid fa-briefcase text-action me-2"></i> Jejak Karir Alumni
                    </a>
                </div>
            </div>

            <!-- Dropdown Gallery Mobile -->
            <div>
                <button class="w-full text-left py-2 flex items-center justify-between text-snow hover:text-action uppercase text-decoration-none bg-transparent border-0 font-mono text-xs p-0 cursor-pointer" 
                        type="button" 
                        onclick="toggleMobileSubmenu('mobileMenuGallery', this)">
                    <span>GALLERY</span>
                    <i class="fa-solid fa-chevron-down text-[10px] text-snow/60 transition-transform duration-200"></i>
                </button>
                <div id="mobileMenuGallery" class="hidden space-y-2 pl-4 pt-2 border-l border-line ml-2 my-1">
                    <a href="{{ route('foto') }}" class="block py-1.5 text-snow/80 hover:text-action uppercase text-decoration-none">
                        <i class="fa-solid fa-camera text-action me-2"></i> Foto
                    </a>
                    <a href="{{ route('video') }}" class="block py-1.5 text-snow/80 hover:text-action uppercase text-decoration-none">
                        <i class="fa-solid fa-video text-action me-2"></i> Video
                    </a>
                </div>
            </div>

            <a href="{{ route('lowongan') }}" class="block py-2 text-snow hover:text-action uppercase text-decoration-none">Lowongan Pekerjaan</a>

            <!-- Dropdown Kemahasiswaan Mobile -->
            <div>
                <button class="w-full text-left py-2 flex items-center justify-between text-snow hover:text-action uppercase text-decoration-none bg-transparent border-0 font-mono text-xs p-0 cursor-pointer" 
                        type="button" 
                        onclick="toggleMobileSubmenu('mobileMenuKemahasiswaan', this)">
                    <span>KEMAHASISWAAN</span>
                    <i class="fa-solid fa-chevron-down text-[10px] text-snow/60 transition-transform duration-200"></i>
                </button>
                <div id="mobileMenuKemahasiswaan" class="hidden space-y-2 pl-4 pt-2 border-l border-line ml-2 my-1">
                    <a href="https://ppkpt.sikak-methodist.org" target="_blank" class="block py-1.5 text-snow/80 hover:text-action uppercase text-decoration-none">
                        1. Satgas PPKPT
                    </a>
                    <a href="https://portalkemahasiswaan.sikak-methodist.org" target="_blank" class="block py-1.5 text-snow/80 hover:text-action uppercase text-decoration-none">
                        2. UKM Kampus
                    </a>
                    <a href="https://konseling.sikak-methodist.org" target="_blank" class="block py-1.5 text-snow/80 hover:text-action uppercase text-decoration-none">
                        3. Konseling Mahasiswa
                    </a>
                </div>
            </div>

            @auth
                <div class="pt-6 border-t border-line">
                    @if(auth()->user()->role == 'admin')
                        <a href="{{ route('admin.home') }}" class="block w-full text-center bg-action text-white font-bold py-2.5 uppercase text-decoration-none">Dashboard Admin</a>
                    @elseif(auth()->user()->role == 'user')
                        <a href="{{ route('user.home') }}" class="block w-full text-center bg-action text-white font-bold py-2.5 uppercase text-decoration-none">Portal Alumni</a>
                    @elseif(auth()->user()->role == 'fakultas')
                        <a href="{{ route('falkutas.home') }}" class="block w-full text-center bg-action text-white font-bold py-2.5 uppercase text-decoration-none">Dashboard Fakultas</a>
                    @endif
                </div>
            @else
                <div class="pt-6 border-t border-line grid grid-cols-2 gap-2">
                    <a href="{{ route('login') }}" class="w-full text-center border border-line text-snow py-2.5 uppercase text-decoration-none">Sign In</a>
                    <a href="{{ route('register') }}" class="w-full text-center bg-action text-white font-bold py-2.5 uppercase text-decoration-none">Sign Up</a>
                </div>
            @endauth
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <main class="flex-1 pt-16">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="w-full py-12 px-4 lg:px-12 bg-ground border-t border-line text-xs font-mono text-snow/60">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-12 gap-8 mb-8 pb-8 border-b border-line">
            
            <!-- Col 1: About & Info -->
            <div class="md:col-span-5 space-y-3">
                <div class="font-anybody font-bold text-xl text-snow uppercase">SIKAK<span class="text-action">UMI</span></div>
                <p class="text-snow/70 text-xs leading-relaxed max-w-md font-archivo">
                    Sistem Informasi Kemahasiswaan, Alumni, dan Kerjasama Universitas Methodist Indonesia. Platform terpadu penelusuran rekam jejak karir alumni & akreditasi institusi.
                </p>
                <div class="text-[11px] text-action tnum">
                    ALAMAT: JL HANG TUAH NO 8, MADRAS HULU, MEDAN POLONIA, MEDAN 20151
                </div>
            </div>

            <!-- Col 2: Quick Links -->
            <div class="md:col-span-3 space-y-2">
                <span class="text-action uppercase font-bold block mb-2">LINK CEPAT</span>
                <ul class="space-y-1.5 list-none p-0">
                    <li><a href="{{ route('pencarian') }}" class="text-snow/70 hover:text-action text-decoration-none">DATA ALUMNI</a></li>
                    <li><a href="{{ route('jejak-karir.index') }}" class="text-snow/70 hover:text-action text-decoration-none">JEJAK KARIR ALUMNI</a></li>
                    <li><a href="{{ route('old-news') }}" class="text-snow/70 hover:text-action text-decoration-none">BERITA KAMPUS</a></li>
                    <li><a href="{{ route('foto') }}" class="text-snow/70 hover:text-action text-decoration-none">GALLERY FOTO &amp; VIDEO</a></li>
                </ul>
            </div>

            <!-- Col 3: System Status -->
            <div class="md:col-span-4 space-y-2">
                <span class="text-action uppercase font-bold block mb-2">SYSTEM TELEMETRY</span>
                <div class="space-y-1 text-[11px]">
                    <div>STATUS: <span class="text-action font-bold">SYSTEM OPERATIONAL</span></div>
                    <div>DATABASES: <span class="text-snow tnum">CONNECTED // ALUMNIS DB</span></div>
                    <div>ACCREDITATION: <span class="text-snow tnum">INSTITUTIONAL GRADE A</span></div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-4">
            <div>&copy; 2026 SIKAK UMI. All Rights Reserved.</div>
            <div class="tnum text-snow/40">SYSTEM TIME: 2026.02.14 UTC</div>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>

    <!-- Lenis Smooth Scroll Setup -->
    <script>
        const lenis = new Lenis({
            duration: 1.0,
            easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
            lerp: 0.12,
            smoothWheel: true,
        });

        function raf(time) {
            lenis.raf(time);
            requestAnimationFrame(raf);
        }
        requestAnimationFrame(raf);

        // Mobile Submenu Toggle Function
        function toggleMobileSubmenu(menuId, btn) {
            const menu = document.getElementById(menuId);
            if (!menu) return;
            const isHidden = menu.classList.contains('hidden');
            menu.classList.toggle('hidden');
            const icon = btn.querySelector('.fa-chevron-down');
            if (icon) {
                icon.style.transform = isHidden ? 'rotate(180deg)' : 'rotate(0deg)';
            }
        }

        // Intersection Observer for .io elements
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.io').forEach(el => observer.observe(el));
    </script>
    @stack('scripts')
</body>

</html>