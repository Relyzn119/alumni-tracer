<!DOCTYPE html>
<html lang="id" class="dark scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIKAK Methodist - Portal Alumni dan Jejak Karir Alumni</title>
    <meta name="description" content="Portal Alumni dan Jejak Karir Alumni Universitas Methodist Indonesia. Sistem penelusuran tracer study, rekam jejak karir, dan jejaring alumni terpadu.">

    <!-- Google Fonts: Figtree -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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
                    },
                    fontFamily: {
                        figtree: ['Figtree', 'sans-serif'],
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
            --accent: #243B53;
            --action: #243B53;
        }

        body {
            background-color: #080805;
            color: #ffffff;
            font-family: 'Figtree', sans-serif;
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

        /* Hide Scrollbars */
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>
<body class="bg-[#080805] text-white font-['Figtree'] antialiased overflow-x-hidden selection:bg-[#243B53] selection:text-white">

    <!-- ========================================== -->
    <!-- SECTION 1: HERO & NAV                      -->
    <!-- ========================================== -->
    <header class="relative w-full min-h-screen flex flex-col justify-between overflow-hidden">
        <!-- Hero Background Image (scale-105 to prevent white edge artifacts) -->
        <img 
            src="https://images.unsplash.com/photo-1541339907198-e08756dedf3f?q=80&w=2940&auto=format&fit=crop" 
            alt="Universitas Methodist Indonesia Auditorium" 
            class="absolute inset-0 w-full h-full object-cover scale-105 pointer-events-none select-none z-0 brightness-75 transition-transform duration-1000 ease-out"
        />

        <!-- Hero Gradient Overlay -->
        <div class="absolute inset-0 z-10 bg-gradient-to-b from-[#080805]/75 via-[#080805]/45 to-[#080805]/95 pointer-events-none"></div>

        <!-- Navigation Bar (Transparent & Floating) -->
        <nav class="absolute top-5 md:top-7 inset-x-0 z-50 px-6 md:px-12 bg-transparent pointer-events-none">
            <div class="max-w-7xl mx-auto flex items-center justify-between pointer-events-auto">
                <!-- Left: Logo -->
                <a href="#hero" class="flex items-center gap-2 group text-decoration-none">
                    <span class="text-lg md:text-xl font-medium tracking-tight text-white group-hover:text-neutral-200 transition-colors">
                        SIKAK UMI
                    </span>
                    <span class="w-2.5 h-2.5 rounded-full bg-[#243B53] border border-[#486581] inline-block shadow-[0_0_10px_#243B53]"></span>
                </a>

                <!-- Center: Floating Glass Navbar with Dropdown & Quick Actions -->
                <div class="hidden md:flex items-center gap-5 glass-panel rounded-full px-6 py-2.5 text-xs text-neutral-300 font-light shadow-2xl backdrop-blur-xl">
                    <a href="{{ route('main') }}" class="hover:text-white transition-colors">Home</a>
                    <a href="{{ route('pencarian') }}" class="hover:text-white transition-colors">Data Alumni</a>
                    <a href="{{ route('jejak-karir.index') }}" class="hover:text-white transition-colors">Jejak Karir</a>
                    <a href="#news" class="hover:text-white transition-colors">Berita</a>
                    <a href="#mitra" class="hover:text-white transition-colors">Mitra</a>

                    <div class="w-[1px] h-3.5 bg-white/20 mx-0.5"></div>

                    <!-- Quick Icon Actions -->
                    <div class="flex items-center gap-3.5 text-neutral-300">
                        <a href="{{ route('pencarian') }}" aria-label="Cari Informasi" class="hover:text-[#829AB1] transition-colors flex items-center text-neutral-300">
                            <iconify-icon icon="solar:minimalistic-magnifer-linear" class="text-base"></iconify-icon>
                        </a>
                        <a href="{{ route('login') }}" aria-label="Portal Mahasiswa" class="hover:text-[#829AB1] transition-colors flex items-center text-neutral-300">
                            <iconify-icon icon="solar:user-linear" class="text-base"></iconify-icon>
                        </a>
                    </div>
                </div>

                <!-- Right: Mobile Navigation Circular Glass Button -->
                <div class="glass-panel w-10 h-10 rounded-full flex flex-col items-center justify-center gap-1.5 cursor-pointer hover:border-[#829AB1]/60 transition-all shadow-lg group border border-white/15">
                    <span class="w-4 h-[1px] bg-white group-hover:bg-[#829AB1] transition-colors"></span>
                    <span class="w-4 h-[1px] bg-white group-hover:bg-[#829AB1] transition-colors"></span>
                </div>
            </div>
        </nav>

        <!-- Top Info Bar -->
        <div class="absolute top-24 md:top-32 inset-x-0 z-20 px-6 md:px-12">
            <div class="max-w-7xl mx-auto flex items-center justify-between text-xs tracking-widest uppercase font-light text-neutral-400">
                <div class="flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#243B53] border border-[#486581]"></span>
                    <span>Medan, Indonesia</span>
                </div>
                <div class="hidden md:block tracking-widest text-neutral-400/90">
                    Portal Alumni dan Jejak Karir Alumni
                </div>
            </div>
        </div>

        <!-- Hero Content Layer -->
        <div id="hero" class="relative z-20 max-w-7xl mx-auto w-full px-6 md:px-12 pt-48 pb-16 md:pb-24 mt-auto flex flex-col lg:flex-row items-start lg:items-end justify-between gap-10">
            <!-- Left Copy -->
            <div class="max-w-3xl">
                <div class="inline-flex items-center gap-2 text-xs md:text-sm uppercase tracking-widest text-[#829AB1] font-medium mb-4">
                    <span class="w-2 h-2 rounded-full bg-[#243B53] animate-ping"></span>
                    <span>ALUMNI TRACER &amp; CAREER ACCELERATION</span>
                </div>
                <h1 class="text-5xl md:text-7xl lg:text-8xl font-light tracking-tighter leading-[1.02] text-white">
                    Connecting Alumni, <br />
                    <span class="italic font-normal text-white/90">Shaping The Future</span>
                </h1>
                <p class="text-base md:text-lg text-neutral-300 font-light max-w-xl mt-6 leading-relaxed">
                    Portal Alumni dan Jejak Karir Alumni Universitas Methodist Indonesia. Wadah terintegrasi penelusuran karir lulusan, pengisian tracer study, informasi lowongan kerja, dan sinergi jejaring profesional lintas angkatan.
                </p>
            </div>

            <!-- Right Call to Action Buttons -->
            <div class="flex flex-col sm:flex-row lg:flex-col gap-4 w-full sm:w-auto shrink-0">
                <a 
                    href="{{ route('login') }}" 
                    class="glass-panel px-7 py-4 rounded-full flex items-center justify-between gap-6 hover:text-white hover:border-[#243B53] hover:bg-[#243B53]/30 transition-all group shadow-xl text-decoration-none text-white"
                >
                    <span class="text-sm font-medium tracking-wide">Portal Alumni</span>
                    <iconify-icon icon="solar:arrow-right-linear" class="text-lg group-hover:translate-x-1.5 transition-transform duration-300 text-[#829AB1] group-hover:text-white"></iconify-icon>
                </a>

                <a 
                    href="{{ route('pencarian') }}" 
                    class="glass-panel px-7 py-4 rounded-full flex items-center justify-between gap-6 hover:text-white hover:border-[#243B53] hover:bg-[#243B53]/30 transition-all group shadow-xl text-decoration-none text-white"
                >
                    <span class="text-sm font-medium tracking-wide">Pencarian Alumni</span>
                    <iconify-icon icon="solar:arrow-right-linear" class="text-lg group-hover:translate-x-1.5 transition-transform duration-300 text-[#829AB1] group-hover:text-white"></iconify-icon>
                </a>
            </div>
        </div>
    </header>


    <!-- ========================================== -->
    <!-- SECTION 2: ABOUT TRACER & STATS            -->
    <!-- ========================================== -->
    <!-- ========================================== -->
    <!-- SECTION 2: ABOUT TRACER & STATS            -->
    <!-- ========================================== -->
    <section id="about" class="relative py-24 md:py-32 px-6 md:px-12 border-t border-white/10 bg-transparent overflow-hidden">
        <!-- Background Image (img/sesion4.png) -->
        <img 
            src="{{ asset('img/sesion4.png') }}" 
            alt="Tracer Background" 
            class="absolute inset-0 w-full h-full object-cover object-center pointer-events-none select-none z-0 opacity-40 brightness-90"
        />
        <!-- Progressive Gradient: White-translucent to subtle dark -->
        <div class="absolute inset-0 bg-gradient-to-b from-white/[0.08] via-black/20 to-black/40 pointer-events-none z-0"></div>

        <div class="relative z-10 max-w-7xl mx-auto flex flex-col lg:flex-row gap-16 lg:gap-24 items-start justify-between">
            <!-- Left Column: Details -->
            <div class="w-full lg:w-1/2">
                <div class="inline-flex items-center gap-2 text-xs uppercase tracking-widest text-[#829AB1] font-medium mb-4">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#243B53]"></span>
                    <span>TENTANG TRACER STUDY SIKAK</span>
                </div>
                <h2 class="text-3xl md:text-5xl font-light tracking-tight text-white leading-tight mb-6">
                    Pusat Rekam Jejak Karir &amp; Sinergi Alumni
                </h2>
                <p class="text-neutral-300 font-light leading-relaxed border-b border-white/10 pb-8 mb-8 text-base md:text-lg">
                    SIKAK Tracer Study memetakan transisi lulusan Universitas Methodist Indonesia menuju dunia kerja dan profesional. Data yang dihimpun menjadi fondasi evaluasi kurikulum akademik, akreditasi institusi, serta pembuka jalan kemitraan industri bagi adik-adik mahasiswa.
                </p>

                <!-- Action Links -->
                <div class="flex flex-wrap items-center gap-4">
                    <a 
                        href="{{ route('jejak-karir.index') }}" 
                        class="inline-flex items-center gap-3 bg-[#243B53]/80 backdrop-blur-md border border-[#486581] text-white px-6 py-3.5 rounded-xl hover:bg-[#334E68] transition-all group font-medium text-sm text-decoration-none shadow-[0_0_20px_rgba(36,59,83,0.4)]"
                    >
                        <iconify-icon icon="solar:shield-check-linear" class="text-xl text-[#829AB1]"></iconify-icon>
                        <span>Eksplor Jejak Karir</span>
                        <iconify-icon icon="solar:arrow-right-linear" class="text-lg group-hover:translate-x-1 transition-transform"></iconify-icon>
                    </a>

                    <a 
                        href="{{ route('register') }}" 
                        class="inline-flex items-center gap-2 glass-panel text-neutral-200 px-6 py-3.5 rounded-xl hover:text-white hover:border-[#486581] hover:bg-white/[0.1] transition-all text-sm text-decoration-none shadow-lg"
                    >
                        <span>Registrasi Data Alumni</span>
                    </a>
                </div>
            </div>

            <!-- Right Column: Stats Grid (2x2 Glass Cards) -->
            <div class="w-full lg:w-1/2 grid grid-cols-2 gap-4 md:gap-6">
                <!-- Stat 1 -->
                <div class="glass-panel p-6 rounded-2xl border border-white/10 hover:border-[#486581] hover:bg-white/[0.08] transition-all duration-300 group shadow-lg">
                    <div class="text-4xl md:text-5xl font-light tracking-tight text-white mb-2 group-hover:text-[#829AB1] transition-colors">
                        12K<span class="text-[#829AB1] font-normal">+</span>
                    </div>
                    <div class="text-xs md:text-sm text-neutral-300 font-light">
                        Alumni Terdaftar
                    </div>
                </div>

                <!-- Stat 2 -->
                <div class="glass-panel p-6 rounded-2xl border border-white/10 hover:border-[#486581] hover:bg-white/[0.08] transition-all duration-300 group shadow-lg">
                    <div class="text-4xl md:text-5xl font-light tracking-tight text-white mb-2 group-hover:text-[#829AB1] transition-colors">
                        94<span class="text-[#829AB1] font-normal">%</span>
                    </div>
                    <div class="text-xs md:text-sm text-neutral-300 font-light">
                        Bekerja &lt; 6 Bulan
                    </div>
                </div>

                <!-- Stat 3 -->
                <div class="glass-panel p-6 rounded-2xl border border-white/10 hover:border-[#486581] hover:bg-white/[0.08] transition-all duration-300 group shadow-lg">
                    <div class="text-4xl md:text-5xl font-light tracking-tight text-white mb-2 group-hover:text-[#829AB1] transition-colors">
                        14<span class="text-[#829AB1] font-normal">+</span>
                    </div>
                    <div class="text-xs md:text-sm text-neutral-300 font-light">
                        Program Studi
                    </div>
                </div>

                <!-- Stat 4 -->
                <div class="glass-panel p-6 rounded-2xl border border-white/10 hover:border-[#486581] hover:bg-white/[0.08] transition-all duration-300 group shadow-lg">
                    <div class="text-4xl md:text-5xl font-light tracking-tight text-white mb-2 group-hover:text-[#829AB1] transition-colors">
                        50<span class="text-[#829AB1] font-normal">+</span>
                    </div>
                    <div class="text-xs md:text-sm text-neutral-300 font-light">
                        Mitra Kerjasama
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ========================================== -->
    <!-- SECTION 3: WHY CHOOSE METHODIST (KEUNGGULAN) -->
    <!-- ========================================== -->
    <section id="features" class="relative py-24 px-6 md:px-12 bg-transparent overflow-hidden border-t border-white/10">
        <!-- Background Image (img/sesion3.png) -->
        <img 
            src="{{ asset('img/sesion3.png') }}" 
            alt="Keunggulan Background" 
            class="absolute inset-0 w-full h-full object-cover object-center pointer-events-none select-none z-0 opacity-35 brightness-80"
        />
        <!-- Progressive Darkening Gradient Layer 2 -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/45 via-black/70 to-black/85 pointer-events-none z-0"></div>

        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[550px] h-[550px] bg-[#243B53]/20 rounded-full blur-[120px] pointer-events-none z-0"></div>

        <div class="relative z-10 max-w-7xl mx-auto">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <div class="inline-flex items-center gap-2 text-xs uppercase tracking-widest text-[#829AB1] font-medium mb-3">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#243B53]"></span>
                    <span>KEUNGGULAN LULUSAN</span>
                </div>
                <h2 class="text-3xl md:text-5xl font-light tracking-tight text-white mb-4">
                    Keunggulan Alumni Methodist
                </h2>
                <p class="text-neutral-300 font-light text-base leading-relaxed">
                    Kesiapan kerja, jejaring global, dan kompetensi teruji yang menempatkan lulusan Methodist di barisan terdepan industri.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature Card 1 -->
                <div class="glass-panel bg-white/[0.04] backdrop-blur-xl border border-white/10 p-8 md:p-10 rounded-2xl relative overflow-hidden group hover:border-[#486581] hover:bg-white/[0.08] transition-all duration-300 shadow-2xl flex flex-col justify-between">
                    <div class="w-14 h-14 rounded-2xl glass-panel bg-white/[0.06] backdrop-blur-md border border-white/15 flex items-center justify-center text-[#829AB1] mb-8 group-hover:scale-110 group-hover:border-[#486581] group-hover:bg-[#243B53]/30 transition-all duration-300 shadow-md">
                        <iconify-icon icon="solar:shield-check-linear" class="text-3xl"></iconify-icon>
                    </div>
                    <div>
                        <h3 class="text-xl font-medium text-white mb-3 group-hover:text-[#829AB1] transition-colors">
                            Kompetensi Terstandarisasi
                        </h3>
                        <p class="text-sm text-neutral-300 font-light leading-relaxed">
                            Lulusan dibekali sertifikasi keahlian profesional dan kemampuan adaptif terhadap disrupsi teknologi di dunia kerja modern.
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-white/10 flex items-center text-xs text-neutral-400 group-hover:text-[#829AB1] transition-colors">
                        <span>Lihat Profil Lulusan</span>
                        <iconify-icon icon="solar:arrow-right-linear" class="ml-2 group-hover:translate-x-1 transition-transform"></iconify-icon>
                    </div>
                </div>

                <!-- Feature Card 2 -->
                <div class="glass-panel bg-white/[0.04] backdrop-blur-xl border border-white/10 p-8 md:p-10 rounded-2xl relative overflow-hidden group hover:border-[#486581] hover:bg-white/[0.08] transition-all duration-300 shadow-2xl flex flex-col justify-between">
                    <div class="w-14 h-14 rounded-2xl glass-panel bg-white/[0.06] backdrop-blur-md border border-white/15 flex items-center justify-center text-[#829AB1] mb-8 group-hover:scale-110 group-hover:border-[#486581] group-hover:bg-[#243B53]/30 transition-all duration-300 shadow-md">
                        <iconify-icon icon="solar:laptop-minimalistic-linear" class="text-3xl"></iconify-icon>
                    </div>
                    <div>
                        <h3 class="text-xl font-medium text-white mb-3 group-hover:text-[#829AB1] transition-colors">
                            Portal Tracer Real-Time
                        </h3>
                        <p class="text-sm text-neutral-300 font-light leading-relaxed">
                            Akses mudah pemutakhiran data karir, pencarian sesama rekan alumni, hingga unduhan berkas validasi alumni secara digital.
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-white/10 flex items-center text-xs text-neutral-400 group-hover:text-[#829AB1] transition-colors">
                        <span>Pencarian Database</span>
                        <iconify-icon icon="solar:arrow-right-linear" class="ml-2 group-hover:translate-x-1 transition-transform"></iconify-icon>
                    </div>
                </div>

                <!-- Feature Card 3 -->
                <div class="glass-panel bg-white/[0.04] backdrop-blur-xl border border-white/10 p-8 md:p-10 rounded-2xl relative overflow-hidden group hover:border-[#486581] hover:bg-white/[0.08] transition-all duration-300 shadow-2xl flex flex-col justify-between">
                    <div class="w-14 h-14 rounded-2xl glass-panel bg-white/[0.06] backdrop-blur-md border border-white/15 flex items-center justify-center text-[#829AB1] mb-8 group-hover:scale-110 group-hover:border-[#486581] group-hover:bg-[#243B53]/30 transition-all duration-300 shadow-md">
                        <iconify-icon icon="solar:users-group-rounded-linear" class="text-3xl"></iconify-icon>
                    </div>
                    <div>
                        <h3 class="text-xl font-medium text-white mb-3 group-hover:text-[#829AB1] transition-colors">
                            Jaringan Karir &amp; Kemitraan
                        </h3>
                        <p class="text-sm text-neutral-300 font-light leading-relaxed">
                            Koneksi aktif dengan puluhan institusi, universitas mitra, dan korporasi industri membuka peluang rekrutmen kerja eksklusif.
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-white/10 flex items-center text-xs text-neutral-400 group-hover:text-[#829AB1] transition-colors">
                        <span>Lihat Lowongan Kerja</span>
                        <iconify-icon icon="solar:arrow-right-linear" class="ml-2 group-hover:translate-x-1 transition-transform"></iconify-icon>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ========================================== -->
    <!-- SECTION 4: BERITA TERKINI                  -->
    <!-- ========================================== -->
    <section id="news" class="relative py-24 px-6 md:px-12 bg-transparent overflow-hidden border-t border-white/10">
        <!-- Background Image (img/sesion2.png) -->
        <img 
            src="{{ asset('img/sesion2.png') }}" 
            alt="Berita Background" 
            class="absolute inset-0 w-full h-full object-cover object-center pointer-events-none select-none z-0 opacity-60 brightness-95"
        />
        <!-- Progressive Darkening Gradient Layer 3 -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-black/60 to-black/70 pointer-events-none z-0"></div>

        <div class="relative z-10 max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
                <div>
                    <div class="inline-flex items-center gap-2 text-xs uppercase tracking-widest text-[#829AB1] font-medium mb-3">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#243B53]"></span>
                        <span>BERITA &amp; INFORMASI TERKINI</span>
                    </div>
                    <h2 class="text-3xl md:text-5xl font-light tracking-tight text-white">
                        Lihat Berita Terkini
                    </h2>
                </div>
                <a href="{{ route('old-news') }}" class="inline-flex items-center gap-2 text-xs uppercase tracking-wider text-neutral-400 hover:text-[#829AB1] transition-colors text-decoration-none">
                    <span>Lihat Semua Berita</span>
                    <iconify-icon icon="solar:arrow-right-linear" class="text-sm"></iconify-icon>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="glass-panel bg-white/[0.03] backdrop-blur-xl border border-white/10 rounded-2xl overflow-hidden group hover:border-[#486581] hover:bg-white/[0.07] transition-all duration-300 flex flex-col justify-between shadow-2xl">
                    <div>
                        <div class="relative h-56 w-full overflow-hidden bg-transparent">
                            <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=800&auto=format&fit=crop" 
                                 alt="Tracer Study" 
                                 class="w-full h-full object-cover group-hover:scale-105 duration-700 transition-transform">
                            <span class="absolute top-4 left-4 bg-[#243B53]/80 border border-[#486581] backdrop-blur-md px-3 py-1 rounded-full text-[11px] text-white font-medium uppercase tracking-wider">
                                Tracer Study
                            </span>
                        </div>
                        <div class="p-6">
                            <div class="text-xs text-neutral-400 mb-2">
                                2026
                            </div>
                            <h3 class="text-lg font-medium text-white group-hover:text-[#829AB1] transition-colors line-clamp-2 leading-snug mb-3">
                                Pelaksanaan Tracer Study Lulusan Periode 2026 Universitas Methodist Indonesia
                            </h3>
                            <p class="text-xs text-neutral-300 font-light line-clamp-3 leading-relaxed">
                                Pengisian tracer study dibuka bagi seluruh wisudawan untuk mendukung evaluasi kurikulum dan mutu lulusan.
                            </p>
                        </div>
                    </div>
                    <div class="p-6 pt-0">
                        <a href="{{ route('old-news') }}" class="inline-flex items-center gap-2 text-xs font-medium text-[#829AB1] hover:text-white hover:underline text-decoration-none">
                            <span>Baca Selengkapnya</span>
                            <iconify-icon icon="solar:arrow-right-linear" class="group-hover:translate-x-1 transition-transform"></iconify-icon>
                        </a>
                    </div>
                </div>

                <div class="glass-panel bg-white/[0.03] backdrop-blur-xl border border-white/10 rounded-2xl overflow-hidden group hover:border-[#486581] hover:bg-white/[0.07] transition-all duration-300 flex flex-col justify-between shadow-2xl">
                    <div>
                        <div class="relative h-56 w-full overflow-hidden bg-transparent">
                            <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?q=80&w=800&auto=format&fit=crop" 
                                 alt="Job Fair" 
                                 class="w-full h-full object-cover group-hover:scale-105 duration-700 transition-transform">
                            <span class="absolute top-4 left-4 bg-[#243B53]/80 border border-[#486581] backdrop-blur-md px-3 py-1 rounded-full text-[11px] text-white font-medium uppercase tracking-wider">
                                Karir &amp; Kerjasama
                            </span>
                        </div>
                        <div class="p-6">
                            <div class="text-xs text-neutral-400 mb-2">
                                2026
                            </div>
                            <h3 class="text-lg font-medium text-white group-hover:text-[#829AB1] transition-colors line-clamp-2 leading-snug mb-3">
                                Career Expo &amp; Rekrutmen Bersama Mitra Industri Nasional
                            </h3>
                            <p class="text-xs text-neutral-300 font-light line-clamp-3 leading-relaxed">
                                Temukan peluang karir strategis bersama puluhan perusahaan rekanan yang siap merekrut lulusan berprestasi.
                            </p>
                        </div>
                    </div>
                    <div class="p-6 pt-0">
                        <a href="{{ route('lowongan') }}" class="inline-flex items-center gap-2 text-xs font-medium text-[#829AB1] hover:text-white hover:underline text-decoration-none">
                            <span>Baca Selengkapnya</span>
                            <iconify-icon icon="solar:arrow-right-linear" class="group-hover:translate-x-1 transition-transform"></iconify-icon>
                        </a>
                    </div>
                </div>

                <div class="glass-panel bg-white/[0.03] backdrop-blur-xl border border-white/10 rounded-2xl overflow-hidden group hover:border-[#486581] hover:bg-white/[0.07] transition-all duration-300 flex flex-col justify-between shadow-2xl">
                    <div>
                        <div class="relative h-56 w-full overflow-hidden bg-transparent">
                            <img src="https://images.unsplash.com/photo-1541339907198-e08756dedf3f?q=80&w=800&auto=format&fit=crop" 
                                 alt="Alumni Gathering" 
                                 class="w-full h-full object-cover group-hover:scale-105 duration-700 transition-transform">
                            <span class="absolute top-4 left-4 bg-[#243B53]/80 border border-[#486581] backdrop-blur-md px-3 py-1 rounded-full text-[11px] text-white font-medium uppercase tracking-wider">
                                Ikatan Alumni
                            </span>
                        </div>
                        <div class="p-6">
                            <div class="text-xs text-neutral-400 mb-2">
                                2026
                            </div>
                            <h3 class="text-lg font-medium text-white group-hover:text-[#829AB1] transition-colors line-clamp-2 leading-snug mb-3">
                                Temu Akbar Alumni &amp; Penguatan Sinergi Lintas Generasi
                            </h3>
                            <p class="text-xs text-neutral-300 font-light line-clamp-3 leading-relaxed">
                                Mempererat silaturahmi dan kolaborasi profesional alumni Universitas Methodist Indonesia di seluruh penjuru tanah air.
                            </p>
                        </div>
                    </div>
                    <div class="p-6 pt-0">
                        <a href="{{ route('old-news') }}" class="inline-flex items-center gap-2 text-xs font-medium text-[#829AB1] hover:text-white hover:underline text-decoration-none">
                            <span>Baca Selengkapnya</span>
                            <iconify-icon icon="solar:arrow-right-linear" class="group-hover:translate-x-1 transition-transform"></iconify-icon>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ========================================== -->
    <!-- SECTION 5: MITRA KERJASAMA (SEMUA LOGO)    -->
    <!-- ========================================== -->
    @php
        $logoFiles = [];
        $logoPath = public_path('images/logo_instansi');
        if (is_dir($logoPath)) {
            $scanned = scandir($logoPath);
            foreach ($scanned as $f) {
                if (!in_array($f, ['.', '..']) && !is_dir($logoPath . '/' . $f)) {
                    $logoFiles[] = $f;
                }
            }
        }
    @endphp

    <section id="mitra" class="relative py-24 px-6 md:px-12 bg-transparent overflow-hidden border-t border-white/10">
        <!-- Background Image (img/sesion5.png) -->
        <img 
            src="{{ asset('img/sesion5.png') }}" 
            alt="Mitra Background" 
            class="absolute inset-0 w-full h-full object-cover object-center pointer-events-none select-none z-0 opacity-55 brightness-95"
        />
        <!-- Progressive Darkening Gradient Layer 4: Deep dark blend into footer -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/65 via-black/75 to-black/85 pointer-events-none z-0"></div>

        <div class="relative z-10 max-w-7xl mx-auto">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <div class="inline-flex items-center gap-2 text-xs uppercase tracking-widest text-[#829AB1] font-medium mb-3">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#243B53]"></span>
                    <span>SINERGI &amp; JARINGAN GLOBAL</span>
                </div>
                <h2 class="text-3xl md:text-5xl font-light tracking-tight text-white mb-4">
                    MITRA KERJASAMA
                </h2>
                <p class="text-neutral-300 font-light text-base leading-relaxed">
                    Jaringan kolaborasi strategis Universitas Methodist Indonesia bersama instansi pemerintah, universitas mitra, rumah sakit, dan korporasi industri terkemuka.
                </p>
            </div>
            
            @if(count($logoFiles) > 0)
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4 items-center">
                    @foreach ($logoFiles as $logo)
                    <div class="glass-panel bg-white/[0.03] backdrop-blur-md border border-white/10 p-3.5 rounded-xl flex items-center justify-center h-24 hover:border-[#486581] hover:bg-white/[0.08] transition-all duration-300 group shadow-lg">
                        <img 
                            src="{{ asset('images/logo_instansi/' . $logo) }}" 
                            alt="{{ pathinfo($logo, PATHINFO_FILENAME) }}" 
                            loading="lazy"
                            class="max-h-12 max-w-[110px] object-contain opacity-80 group-hover:opacity-100 group-hover:scale-105 transition-all duration-300"
                        />
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>


    <!-- ========================================== -->
    <!-- SECTION 7: FOOTER & CALL TO ACTION         -->
    <!-- ========================================== -->
    <footer class="bg-[#080805] text-white pt-20 pb-12 border-t border-white/10 relative">
        <div class="max-w-7xl mx-auto px-6 md:px-12">
            <!-- Footer CTA Box -->
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
                        <span class="text-xl font-medium tracking-tight text-white">SIKAK METHODIST</span>
                        <span class="w-2.5 h-2.5 rounded-full bg-[#243B53]"></span>
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
                        <li><a href="{{ route('lowongan') }}" class="hover:text-[#829AB1] transition-colors text-decoration-none text-neutral-400">Info Lowongan</a></li>
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

</body>
</html>
