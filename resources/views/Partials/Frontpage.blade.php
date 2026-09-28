<!DOCTYPE html>
<html lang="id" class="dark scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Portal Alumni & Jejak Karir') - SIKAK Methodist</title>
    <meta name="description" content="Portal Alumni dan Jejak Karir Alumni Universitas Methodist Indonesia. Sistem penelusuran tracer study, rekam jejak karir, dan jejaring alumni terpadu.">

    <!-- Google Fonts: Figtree -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- FontAwesome 6 (for sub-page compatibility) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Bootstrap 5 CSS (for utility & dropdown compatibility) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        ground: '#080805',
                        surface: '#0f0f0a',
                        'surface-elevated': '#14140e',
                        accent: '#243B53',
                        action: '#243B53',
                        'accent-light': '#486581',
                        'accent-bright': '#627D98',
                        alert: '#FF6B3D',
                        snow: '#FFFFFF',
                        line: 'rgba(255, 255, 255, 0.1)',
                        'line-heavy': 'rgba(255, 255, 255, 0.25)',
                    },
                    fontFamily: {
                        figtree: ['Figtree', 'sans-serif'],
                        sans: ['Figtree', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <!-- Alpine.js v3 -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Iconify Web Component -->
    <script src="https://code.iconify.design/iconify-icon/1.0.8/iconify-icon.min.js"></script>

    <style>
        :root {
            --ground: #080805;
            --surface: #0f0f0a;
            --accent: #243B53;
            --action: #243B53;
        }

        body {
            background-color: #080805;
            color: #ffffff;
            font-family: 'Figtree', sans-serif;
            overflow-x: hidden;
        }

        /* Glass Panel Custom Utility */
        .glass-panel {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .glass-panel-hover {
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .glass-panel-hover:hover {
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(36, 59, 83, 0.6);
        }

        /* Glassmorphism for subpage surface & container elements */
        .bg-surface {
            background-color: rgba(15, 15, 10, 0.68) !important;
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
        }

        .bg-ground {
            background-color: rgba(8, 8, 5, 0.45) !important;
        }

        /* Hide Scrollbars */
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        /* Dropdown custom dark styling with navbar-background.png */
        .dropdown-menu-dark-sikak {
            background-color: rgba(15, 15, 10, 0.75) !important;
            background-image: linear-gradient(to bottom, rgba(8, 8, 5, 0.7), rgba(15, 15, 10, 0.85)), url('{{ asset("img/navbar-background.png") }}') !important;
            background-size: cover !important;
            background-position: center !important;
            border: 1px solid rgba(255, 255, 255, 0.15) !important;
            border-radius: 14px;
            padding: 8px;
            box-shadow: 0 20px 45px rgba(0,0,0,0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }

        .dropdown-menu-dark-sikak .dropdown-item {
            color: #ffffff !important;
            font-size: 13px;
            padding: 8px 14px;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .dropdown-menu-dark-sikak .dropdown-item:hover {
            background-color: rgba(36, 59, 83, 0.5) !important;
            color: #829AB1 !important;
        }

        /* Nav link custom style */
        .sikak-nav-link {
            color: rgba(255, 255, 255, 0.75) !important;
            font-size: 13px;
            font-weight: 300;
            transition: color 0.2s ease;
            text-decoration: none;
        }

        .sikak-nav-link:hover, .sikak-nav-link.active {
            color: #829AB1 !important;
        }

        /* Intersection Observer Animation */
        .io {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.8s ease, transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .io.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Transparent Glass Offcanvas */
        #offcanvasMobileNav {
            background: rgba(8, 8, 5, 0.65) !important;
            backdrop-filter: blur(24px) !important;
            -webkit-backdrop-filter: blur(24px) !important;
            border-left: 1px solid rgba(255, 255, 255, 0.12) !important;
            box-shadow: -10px 0 40px rgba(0, 0, 0, 0.7);
        }

        .offcanvas-backdrop.show {
            opacity: 0.45 !important;
            backdrop-filter: blur(6px) !important;
            -webkit-backdrop-filter: blur(6px) !important;
        }
    </style>
    @stack('script-css')
    @stack('styles')
</head>

<body class="bg-[#080805] text-white font-['Figtree'] antialiased min-h-screen flex flex-col justify-between selection:bg-[#243B53] selection:text-white">

    <!-- ========================================== -->
    <!-- NAVIGATION BAR (TRANSPARENT & FLOATING)    -->
    <!-- ========================================== -->
    <header class="fixed top-0 left-0 w-full z-50 px-6 md:px-12 pt-5 md:pt-7 pb-2 bg-transparent pointer-events-none transition-all duration-300">
        <div class="max-w-7xl mx-auto flex items-center justify-between pointer-events-auto">
            
            <!-- Left: Brand Logo with Steel Blue Dot -->
            <div class="flex items-center gap-6">
                <a href="{{ route('main') }}" class="flex items-center gap-2 group text-decoration-none">
                    <span class="text-lg md:text-xl font-medium tracking-tight text-white group-hover:text-neutral-200 transition-colors">
                        SIKAK UMI
                    </span>
                    <span class="w-2.5 h-2.5 rounded-full bg-[#243B53] border border-[#486581] inline-block shadow-[0_0_10px_#243B53] animate-pulse"></span>
                </a>
            </div>

            <!-- Middle: Desktop Navigation Links (Floating Glass Pill Style) -->
            <nav class="hidden lg:flex items-center gap-5 glass-panel rounded-full px-6 py-2.5 text-xs text-neutral-300 font-light shadow-2xl backdrop-blur-xl">
                <a class="sikak-nav-link {{ request()->routeIs('main') ? 'active text-[#829AB1]' : '' }}" href="{{ route('main') }}">Home</a>

                <!-- Dropdown Alumni & Tracer -->
                <div class="dropdown">
                    <button class="sikak-nav-link dropdown-toggle bg-transparent border-0 p-0 flex items-center gap-1.5 {{ request()->routeIs('pencarian*') || request()->routeIs('jejak-karir*') ? 'active text-[#829AB1]' : '' }}" 
                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span>Alumni &amp; Karir</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark-sikak">
                        <li>
                            <a class="dropdown-item flex items-center gap-2" href="{{ route('pencarian') }}">
                                <iconify-icon icon="solar:users-group-rounded-linear" class="text-base text-[#829AB1]"></iconify-icon>
                                <span>Pencarian Data Alumni</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item flex items-center gap-2" href="{{ route('jejak-karir.index') }}">
                                <iconify-icon icon="solar:shield-check-linear" class="text-base text-[#829AB1]"></iconify-icon>
                                <span>Jejak Karir Alumni</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <a class="sikak-nav-link {{ request()->routeIs('old-news') ? 'active text-[#829AB1]' : '' }}" href="{{ route('old-news') }}">Berita</a>
                <a class="sikak-nav-link {{ request()->routeIs('lowongan*') ? 'active text-[#829AB1]' : '' }}" href="{{ route('lowongan') }}">Lowongan</a>

                <!-- Dropdown Gallery -->
                <div class="dropdown">
                    <button class="sikak-nav-link dropdown-toggle bg-transparent border-0 p-0 flex items-center gap-1.5 {{ request()->routeIs('foto*') || request()->routeIs('video*') ? 'active text-[#829AB1]' : '' }}" 
                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span>Gallery</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark-sikak">
                        <li><a class="dropdown-item" href="{{ route('foto') }}">Foto</a></li>
                        <li><a class="dropdown-item" href="{{ route('video') }}">Video</a></li>
                    </ul>
                </div>

                <!-- Dropdown Kemahasiswaan -->
                <div class="dropdown">
                    <button class="sikak-nav-link dropdown-toggle bg-transparent border-0 p-0 flex items-center gap-1.5" 
                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span>Kemahasiswaan</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark-sikak">
                        <li><a class="dropdown-item" href="https://ppkpt.sikak-methodist.org" target="_blank">1. Satgas PPKPT</a></li>
                        <li><a class="dropdown-item" href="https://portalkemahasiswaan.sikak-methodist.org" target="_blank">2. UKM Kampus</a></li>
                        <li><a class="dropdown-item" href="https://konseling.sikak-methodist.org" target="_blank">3. Konseling Mahasiswa</a></li>
                    </ul>
                </div>

                <div class="w-[1px] h-3.5 bg-white/20 mx-0.5"></div>

                <!-- Quick Icon Actions -->
                <div class="flex items-center gap-3.5 text-neutral-300">
                    <a href="{{ route('pencarian') }}" aria-label="Cari Alumni" class="hover:text-[#829AB1] transition-colors flex items-center text-decoration-none text-neutral-300">
                        <iconify-icon icon="solar:minimalistic-magnifer-linear" class="text-base"></iconify-icon>
                    </a>
                    <a href="{{ route('login') }}" aria-label="Portal Alumni" class="hover:text-[#829AB1] transition-colors flex items-center text-decoration-none text-neutral-300">
                        <iconify-icon icon="solar:user-linear" class="text-base"></iconify-icon>
                    </a>
                </div>
            </nav>

            <!-- Right: Auth Buttons & Minimal Glass Circle Hamburger -->
            <div class="flex items-center gap-3">
                @auth
                    @if(auth()->user()->role == 'admin')
                        <a href="{{ route('admin.home') }}" class="hidden sm:inline-flex items-center gap-2 bg-[#243B53] border border-[#486581] text-white text-xs font-medium px-4 py-2 rounded-full hover:bg-[#334E68] transition-all text-decoration-none shadow-[0_0_15px_rgba(36,59,83,0.4)]">
                            <iconify-icon icon="solar:shield-check-linear" class="text-base text-[#829AB1]"></iconify-icon>
                            <span>Dashboard Admin</span>
                        </a>
                    @elseif(auth()->user()->role == 'user')
                        <a href="{{ route('user.home') }}" class="hidden sm:inline-flex items-center gap-2 bg-[#243B53] border border-[#486581] text-white text-xs font-medium px-4 py-2 rounded-full hover:bg-[#334E68] transition-all text-decoration-none shadow-[0_0_15px_rgba(36,59,83,0.4)]">
                            <iconify-icon icon="solar:user-linear" class="text-base text-[#829AB1]"></iconify-icon>
                            <span>Portal Alumni</span>
                        </a>
                    @elseif(auth()->user()->role == 'fakultas')
                        <a href="{{ route('falkutas.home') }}" class="hidden sm:inline-flex items-center gap-2 bg-[#243B53] border border-[#486581] text-white text-xs font-medium px-4 py-2 rounded-full hover:bg-[#334E68] transition-all text-decoration-none shadow-[0_0_15px_rgba(36,59,83,0.4)]">
                            <iconify-icon icon="solar:buildings-2-linear" class="text-base text-[#829AB1]"></iconify-icon>
                            <span>Dashboard Fakultas</span>
                        </a>
                    @endif
                @endauth

                <!-- Circular Glass Button with 2 Minimal Lines -->
                <button class="glass-panel w-10 h-10 rounded-full flex flex-col items-center justify-center gap-1.5 cursor-pointer hover:border-[#829AB1]/60 transition-all shadow-lg group border border-white/15 focus:outline-none" 
                        type="button" 
                        data-bs-toggle="offcanvas" 
                        data-bs-target="#offcanvasMobileNav" 
                        aria-label="Toggle Menu">
                    <span class="w-4 h-[1px] bg-white group-hover:bg-[#829AB1] transition-colors"></span>
                    <span class="w-4 h-[1px] bg-white group-hover:bg-[#829AB1] transition-colors"></span>
                </button>
            </div>
        </div>
    </header>

    <!-- MOBILE NAVIGATION OFFCANVAS (TRANSPARENT GLASS) -->
    <div class="offcanvas offcanvas-end text-white border-l border-white/10" tabindex="-1" id="offcanvasMobileNav">
        <div class="offcanvas-header border-b border-white/10 p-5 bg-white/[0.02]">
            <div class="flex items-center gap-2">
                <h5 class="offcanvas-title font-medium text-lg text-white">SIKAK UMI</h5>
                <span class="w-2.5 h-2.5 rounded-full bg-[#243B53] border border-[#486581]"></span>
            </div>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-6 text-sm space-y-4 font-light">
            <a href="{{ route('main') }}" class="block py-2 text-white hover:text-[#829AB1] transition-colors text-decoration-none font-normal">Home</a>
            <a href="{{ route('old-news') }}" class="block py-2 text-neutral-300 hover:text-[#829AB1] transition-colors text-decoration-none">Berita &amp; Informasi</a>

            <!-- Dropdown Alumni Mobile -->
            <div class="border-t border-white/10 pt-3">
                <button class="w-full text-left py-2 flex items-center justify-between text-neutral-300 hover:text-[#829AB1] transition-colors text-decoration-none bg-transparent border-0 p-0 cursor-pointer" 
                        type="button" 
                        onclick="toggleMobileSubmenu('mobileMenuAlumni', this)">
                    <span class="tracking-wider text-xs uppercase font-medium">ALUMNI &amp; TRACER STUDY</span>
                    <i class="fa-solid fa-chevron-down text-xs text-neutral-500 transition-transform duration-200"></i>
                </button>
                <div id="mobileMenuAlumni" class="hidden space-y-2 pl-4 pt-2 border-l border-white/10 ml-2 my-1">
                    <a href="{{ route('pencarian') }}" class="block py-1.5 text-neutral-400 hover:text-[#829AB1] text-decoration-none text-xs">
                        Pencarian Data Alumni
                    </a>
                    <a href="{{ route('jejak-karir.index') }}" class="block py-1.5 text-neutral-400 hover:text-[#829AB1] text-decoration-none text-xs">
                        Jejak Karir Alumni
                    </a>
                </div>
            </div>

            <!-- Dropdown Gallery Mobile -->
            <div class="border-t border-white/10 pt-3">
                <button class="w-full text-left py-2 flex items-center justify-between text-neutral-300 hover:text-[#829AB1] transition-colors text-decoration-none bg-transparent border-0 p-0 cursor-pointer" 
                        type="button" 
                        onclick="toggleMobileSubmenu('mobileMenuGallery', this)">
                    <span class="tracking-wider text-xs uppercase font-medium">GALLERY KAMPUS</span>
                    <i class="fa-solid fa-chevron-down text-xs text-neutral-500 transition-transform duration-200"></i>
                </button>
                <div id="mobileMenuGallery" class="hidden space-y-2 pl-4 pt-2 border-l border-white/10 ml-2 my-1">
                    <a href="{{ route('foto') }}" class="block py-1.5 text-neutral-400 hover:text-[#829AB1] text-decoration-none text-xs">
                        Foto Dokumentasi
                    </a>
                    <a href="{{ route('video') }}" class="block py-1.5 text-neutral-400 hover:text-[#829AB1] text-decoration-none text-xs">
                        Video Kegiatan
                    </a>
                </div>
            </div>

            <a href="{{ route('lowongan') }}" class="block py-2 text-neutral-300 hover:text-[#829AB1] transition-colors text-decoration-none border-t border-white/10 pt-3">Lowongan Pekerjaan</a>

            <!-- Dropdown Kemahasiswaan Mobile -->
            <div class="border-t border-white/10 pt-3">
                <button class="w-full text-left py-2 flex items-center justify-between text-neutral-300 hover:text-[#829AB1] transition-colors text-decoration-none bg-transparent border-0 p-0 cursor-pointer" 
                        type="button" 
                        onclick="toggleMobileSubmenu('mobileMenuKemahasiswaan', this)">
                    <span class="tracking-wider text-xs uppercase font-medium">PORTAL KEMAHASISWAAN</span>
                    <i class="fa-solid fa-chevron-down text-xs text-neutral-500 transition-transform duration-200"></i>
                </button>
                <div id="mobileMenuKemahasiswaan" class="hidden space-y-2 pl-4 pt-2 border-l border-white/10 ml-2 my-1">
                    <a href="https://ppkpt.sikak-methodist.org" target="_blank" class="block py-1.5 text-neutral-400 hover:text-[#829AB1] text-decoration-none text-xs">
                        Satgas PPKPT
                    </a>
                    <a href="https://portalkemahasiswaan.sikak-methodist.org" target="_blank" class="block py-1.5 text-neutral-400 hover:text-[#829AB1] text-decoration-none text-xs">
                        UKM Kampus
                    </a>
                    <a href="https://konseling.sikak-methodist.org" target="_blank" class="block py-1.5 text-neutral-400 hover:text-[#829AB1] text-decoration-none text-xs">
                        Konseling Mahasiswa
                    </a>
                </div>
            </div>

            @auth
                <div class="pt-6 border-t border-white/10">
                    @if(auth()->user()->role == 'admin')
                        <a href="{{ route('admin.home') }}" class="block w-full text-center bg-[#243B53]/80 backdrop-blur-md border border-[#486581] text-white font-medium py-3 rounded-xl hover:bg-[#334E68] transition-all text-decoration-none shadow-lg">Dashboard Admin</a>
                    @elseif(auth()->user()->role == 'user')
                        <a href="{{ route('user.home') }}" class="block w-full text-center bg-[#243B53]/80 backdrop-blur-md border border-[#486581] text-white font-medium py-3 rounded-xl hover:bg-[#334E68] transition-all text-decoration-none shadow-lg">Portal Alumni</a>
                    @elseif(auth()->user()->role == 'fakultas')
                        <a href="{{ route('falkutas.home') }}" class="block w-full text-center bg-[#243B53]/80 backdrop-blur-md border border-[#486581] text-white font-medium py-3 rounded-xl hover:bg-[#334E68] transition-all text-decoration-none shadow-lg">Dashboard Fakultas</a>
                    @endif
                </div>
            @else
                <div class="pt-6 border-t border-white/10 grid grid-cols-2 gap-3">
                    <a href="{{ route('login') }}" class="w-full text-center glass-panel bg-white/[0.05] hover:bg-white/[0.1] border border-white/15 text-white py-3 rounded-xl transition-all text-decoration-none shadow-md">Sign In</a>
                    <a href="{{ route('register') }}" class="w-full text-center bg-[#243B53]/80 backdrop-blur-md border border-[#486581] text-white font-medium py-3 rounded-xl hover:bg-[#334E68] transition-all text-decoration-none shadow-lg">Daftar Alumni</a>
                </div>
            @endauth
        </div>
    </div>

    <!-- ========================================== -->
    <!-- MAIN CONTENT YIELD                         -->
    <!-- ========================================== -->
    <main class="flex-1 relative">
        @if(!request()->routeIs('main'))
            <!-- Subpage Background with img/navbar-background.png -->
            <div class="fixed inset-0 pointer-events-none -z-10 overflow-hidden">
                <img 
                    src="{{ asset('img/navbar-background.png') }}" 
                    alt="Navbar Background" 
                    class="w-full h-full object-cover object-center opacity-60 brightness-95"
                />
                <div class="absolute inset-0 bg-gradient-to-b from-[#080805]/80 via-[#080805]/65 to-[#080805]/95"></div>
            </div>
        @endif
        <div class="{{ !request()->routeIs('main') ? 'pt-24 md:pt-28' : '' }}">
            @yield('content')
        </div>
    </main>

    <!-- ========================================== -->
    <!-- FOOTER                                     -->
    <!-- ========================================== -->
    <footer class="bg-[#080805] text-white pt-20 pb-12 border-t border-white/10 relative">
        <div class="max-w-7xl mx-auto px-6 md:px-12">
            <!-- Footer Alumni Tracer Box -->
            <div class="glass-panel rounded-3xl p-8 md:p-14 mb-20 relative overflow-hidden flex flex-col md:flex-row items-center justify-between gap-8 border border-white/15">
                <div class="max-w-xl">
                    <span class="text-xs uppercase tracking-widest text-[#829AB1] font-medium block mb-2">TRACER STUDY &amp; JEJAK KARIR</span>
                    <h3 class="text-2xl md:text-4xl font-light tracking-tight text-white mb-3">
                        Bagikan Rekam Jejak Karir Anda
                    </h3>
                    <p class="text-sm text-neutral-400 font-light leading-relaxed">
                        Dukung peningkatan mutu akreditasi dan sinergi kemitraan karir Universitas Methodist Indonesia dengan mengisi kuesioner tracer study.
                    </p>
                </div>
                <a 
                    href="{{ route('register') }}" 
                    class="bg-[#243B53] border border-[#486581] text-white hover:bg-[#334E68] px-8 py-4 rounded-full font-medium text-sm flex items-center gap-3 transition-all hover:shadow-[0_0_20px_rgba(36,59,83,0.6)] shrink-0 group text-decoration-none"
                >
                    <span>Isi Tracer Study</span>
                    <iconify-icon icon="solar:arrow-right-linear" class="text-lg group-hover:translate-x-1 transition-transform text-[#829AB1]"></iconify-icon>
                </a>
            </div>

            <!-- Footer Main Content Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 pb-16 border-b border-white/10">
                <!-- Column 1: Brand & Contact -->
                <div class="lg:col-span-2">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="text-xl font-medium tracking-tight text-white">SIKAK UMI</span>
                        <span class="w-2.5 h-2.5 rounded-full bg-[#243B53] border border-[#486581]"></span>
                    </div>
                    <p class="text-sm text-neutral-400 font-light leading-relaxed mb-6 max-w-sm">
                        Portal Alumni dan Jejak Karir Alumni - Pusat penelusuran lulusan dan jejaring profesional Universitas Methodist Indonesia.
                    </p>
                    <div class="space-y-2 text-xs text-neutral-400 font-light">
                        <p class="flex items-start gap-2">
                            <iconify-icon icon="solar:buildings-2-linear" class="text-base text-[#829AB1] shrink-0 mt-0.5"></iconify-icon>
                            <span>Jl. Hang Tuah No. 8, Madras Hulu, Kec. Medan Polonia, Kota Medan, Sumatera Utara 20151</span>
                        </p>
                        <p class="flex items-center gap-2">
                            <iconify-icon icon="solar:user-linear" class="text-base text-[#829AB1] shrink-0"></iconify-icon>
                            <span>info@methodist.ac.id | (061) 4157882</span>
                        </p>
                    </div>
                </div>

                <!-- Column 2: Layanan Alumni -->
                <div>
                    <h4 class="text-sm font-medium text-white uppercase tracking-wider mb-4">Layanan Alumni</h4>
                    <ul class="space-y-2.5 text-xs text-neutral-400 font-light list-none p-0">
                        <li><a href="{{ route('login') }}" class="hover:text-[#829AB1] transition-colors text-decoration-none text-neutral-400">Portal Alumni</a></li>
                        <li><a href="{{ route('pencarian') }}" class="hover:text-[#829AB1] transition-colors text-decoration-none text-neutral-400">Pencarian Alumni</a></li>
                        <li><a href="{{ route('jejak-karir.index') }}" class="hover:text-[#829AB1] transition-colors text-decoration-none text-neutral-400">Jejak Karir</a></li>
                        <li><a href="{{ route('lowongan') }}" class="hover:text-[#829AB1] transition-colors text-decoration-none text-neutral-400">Info Lowongan Kerja</a></li>
                        <li><a href="{{ route('register') }}" class="hover:text-[#829AB1] transition-colors text-decoration-none text-neutral-400">Registrasi Lulusan</a></li>
                    </ul>
                </div>

                <!-- Column 3: Fakultas -->
                <div>
                    <h4 class="text-sm font-medium text-white uppercase tracking-wider mb-4">Fakultas</h4>
                    <ul class="space-y-2.5 text-xs text-neutral-400 font-light list-none p-0">
                        <li><a href="https://fikot.methodist.ac.id" target="_blank" class="hover:text-[#829AB1] transition-colors text-decoration-none text-neutral-400">Ilmu Komputer</a></li>
                        <li><a href="https://fk.methodist.ac.id" target="_blank" class="hover:text-[#829AB1] transition-colors text-decoration-none text-neutral-400">Kedokteran</a></li>
                        <li><a href="https://feb.methodist.ac.id" target="_blank" class="hover:text-[#829AB1] transition-colors text-decoration-none text-neutral-400">Ekonomi &amp; Bisnis</a></li>
                        <li><a href="https://ft.methodist.ac.id" target="_blank" class="hover:text-[#829AB1] transition-colors text-decoration-none text-neutral-400">Teknik &amp; Arsitektur</a></li>
                        <li><a href="https://sastra.methodist.ac.id" target="_blank" class="hover:text-[#829AB1] transition-colors text-decoration-none text-neutral-400">Sastra &amp; Bahasa</a></li>
                    </ul>
                </div>

                <!-- Column 4: Tautan Penting -->
                <div>
                    <h4 class="text-sm font-medium text-white uppercase tracking-wider mb-4">Tautan</h4>
                    <ul class="space-y-2.5 text-xs text-neutral-400 font-light list-none p-0">
                        <li><a href="{{ route('old-news') }}" class="hover:text-[#829AB1] transition-colors text-decoration-none text-neutral-400">Berita Kampus</a></li>
                        <li><a href="{{ route('foto') }}" class="hover:text-[#829AB1] transition-colors text-decoration-none text-neutral-400">Dokumentasi Foto</a></li>
                        <li><a href="{{ route('video') }}" class="hover:text-[#829AB1] transition-colors text-decoration-none text-neutral-400">Dokumentasi Video</a></li>
                        <li><a href="https://portalkemahasiswaan.sikak-methodist.org" target="_blank" class="hover:text-[#829AB1] transition-colors text-decoration-none text-neutral-400">Kemahasiswaan</a></li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Copyright -->
            <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-neutral-500 font-light">
                <div>
                    &copy; {{ date('Y') }} Universitas Methodist Indonesia. All rights reserved. SIKAK Alumni Tracer Portal.
                </div>
                <div class="flex items-center gap-6">
                    <a href="#privacy" class="hover:text-neutral-300 transition-colors text-decoration-none text-neutral-500">Kebijakan Privasi</a>
                    <a href="#terms" class="hover:text-neutral-300 transition-colors text-decoration-none text-neutral-500">Syarat &amp; Ketentuan</a>
                    <a href="#support" class="hover:text-neutral-300 transition-colors text-decoration-none text-neutral-500">Bantuan IT</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>

    <script>
        // Mobile Submenu Toggle
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