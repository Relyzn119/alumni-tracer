@extends('Partials.Frontpage')
@section('title', 'Portal Alumni dan Jejak Karir Alumni')

@section('content')

    <!-- ========================================== -->
    <!-- SECTION 1: HERO & COVER                    -->
    <!-- ========================================== -->
    <section class="relative w-full min-h-[95vh] flex flex-col justify-between overflow-hidden pt-24 pb-16 md:pb-24 border-b border-white/10">
        <!-- Hero Background Image (scale-105 to prevent white edge artifacts) -->
        <img 
            src="https://images.unsplash.com/photo-1541339907198-e08756dedf3f?q=80&w=2940&auto=format&fit=crop" 
            alt="Universitas Methodist Indonesia Auditorium" 
            class="absolute inset-0 w-full h-full object-cover scale-105 pointer-events-none select-none z-0 brightness-75 transition-transform duration-1000 ease-out"
        />

        <!-- Hero Gradient Overlay -->
        <div class="absolute inset-0 z-10 bg-gradient-to-b from-[#080805]/75 via-[#080805]/45 to-[#080805]/95 pointer-events-none"></div>

        <!-- Top Info Bar -->
        <div class="relative z-20 w-full max-w-7xl mx-auto px-6 md:px-12 pt-6">
            <div class="flex items-center justify-between text-xs tracking-widest uppercase font-light text-neutral-400">
                <div class="flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-[#243B53] border border-[#486581]"></span>
                    <span>Medan, Indonesia</span>
                </div>
                <div class="hidden md:block tracking-widest text-neutral-400/90">
                    Portal Alumni dan Jejak Karir Alumni
                </div>
            </div>
        </div>

        <!-- Hero Content Layer -->
        <div id="hero" class="relative z-20 max-w-7xl mx-auto w-full px-6 md:px-12 pt-20 mt-auto flex flex-col lg:flex-row items-start lg:items-end justify-between gap-10">
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
    </section>


    <!-- ========================================== -->
    <!-- SECTION 2: ABOUT TRACER & STATS            -->
    <!-- ========================================== -->
    <!-- ========================================== -->
    <!-- SECTION 2: ABOUT TRACER & STATS            -->
    <!-- ========================================== -->
    <section id="about" class="relative py-24 md:py-32 px-6 md:px-12 bg-transparent border-b border-white/10 overflow-hidden">
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
            <div class="w-full lg:w-1/2 io">
                <div class="inline-flex items-center gap-2 text-xs uppercase tracking-widest text-[#829AB1] font-medium mb-4">
                    <span class="w-2 h-2 rounded-full bg-[#243B53]"></span>
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
            <div class="w-full lg:w-1/2 grid grid-cols-2 gap-4 md:gap-6 io">
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
                        {{ isset($partner) && $partner->count() > 0 ? $partner->count() : '50' }}<span class="text-[#829AB1] font-normal">+</span>
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
    <section id="features" class="relative py-24 px-6 md:px-12 bg-transparent overflow-hidden border-b border-white/10">
        <!-- Background Image (img/sesion3.png) -->
        <img 
            src="{{ asset('img/sesion3.png') }}" 
            alt="Keunggulan Background" 
            class="absolute inset-0 w-full h-full object-cover object-center pointer-events-none select-none z-0 opacity-35 brightness-80"
        />
        <!-- Progressive Darkening Gradient Layer 2 -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/45 via-black/70 to-black/85 pointer-events-none z-0"></div>

        <!-- Central Glow Circle Detail -->
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[550px] h-[550px] bg-[#243B53]/20 rounded-full blur-[120px] pointer-events-none z-0"></div>

        <div class="relative z-10 max-w-7xl mx-auto">
            <!-- Section Header -->
            <div class="text-center max-w-2xl mx-auto mb-16 io">
                <div class="inline-flex items-center gap-2 text-xs uppercase tracking-widest text-[#829AB1] font-medium mb-3">
                    <span class="w-2 h-2 rounded-full bg-[#243B53]"></span>
                    <span>KEUNGGULAN LULUSAN</span>
                </div>
                <h2 class="text-3xl md:text-5xl font-light tracking-tight text-white mb-4">
                    Keunggulan Alumni Methodist
                </h2>
                <p class="text-neutral-300 font-light text-base leading-relaxed">
                    Kesiapan kerja, jejaring global, dan kompetensi teruji yang menempatkan lulusan Methodist di barisan terdepan industri.
                </p>
            </div>

            <!-- 3-Column Feature Cards Grid (Glass Styling) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature Card 1 -->
                <div class="glass-panel bg-white/[0.04] backdrop-blur-xl border border-white/10 p-8 md:p-10 rounded-2xl relative overflow-hidden group hover:border-[#486581] hover:bg-white/[0.08] transition-all duration-300 shadow-2xl flex flex-col justify-between io">
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
                <div class="glass-panel bg-white/[0.04] backdrop-blur-xl border border-white/10 p-8 md:p-10 rounded-2xl relative overflow-hidden group hover:border-[#486581] hover:bg-white/[0.08] transition-all duration-300 shadow-2xl flex flex-col justify-between io">
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
                <div class="glass-panel bg-white/[0.04] backdrop-blur-xl border border-white/10 p-8 md:p-10 rounded-2xl relative overflow-hidden group hover:border-[#486581] hover:bg-white/[0.08] transition-all duration-300 shadow-2xl flex flex-col justify-between io">
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
    <!-- SECTION 4: BERITA TERKINI & LIHAT BERITA   -->
    <!-- ========================================== -->
    <section id="news" class="relative py-24 px-6 md:px-12 bg-transparent overflow-hidden border-b border-white/10">
        <!-- Background Image (img/sesion2.png) -->
        <img 
            src="{{ asset('img/sesion2.png') }}" 
            alt="Berita Background" 
            class="absolute inset-0 w-full h-full object-cover object-center pointer-events-none select-none z-0 opacity-60 brightness-95"
        />
        <!-- Progressive Darkening Gradient Layer 3 -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-black/60 to-black/70 pointer-events-none z-0"></div>

        <div class="relative z-10 max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12 io">
                <div>
                    <div class="inline-flex items-center gap-2 text-xs uppercase tracking-widest text-[#829AB1] font-medium mb-3">
                        <span class="w-2 h-2 rounded-full bg-[#243B53]"></span>
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

            @if(isset($datas) && $datas->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($datas as $item)
                    <div class="glass-panel bg-white/[0.03] backdrop-blur-xl border border-white/10 rounded-2xl overflow-hidden group hover:border-[#486581] hover:bg-white/[0.07] transition-all duration-300 flex flex-col justify-between shadow-2xl io">
                        <div>
                            <div class="relative h-56 w-full overflow-hidden bg-transparent">
                                <img src="{{ asset('images/berita/' . ($item->file ?? 'default.jpg')) }}" 
                                     alt="{{ $item->judul }}" 
                                     class="w-full h-full object-cover group-hover:scale-105 duration-700 transition-transform">
                                <span class="absolute top-4 left-4 bg-[#243B53]/80 border border-[#486581] backdrop-blur-md px-3 py-1 rounded-full text-[11px] text-white font-medium uppercase tracking-wider">
                                    {{ $item->kategori->nama ?? 'Akademik' }}
                                </span>
                            </div>
                            <div class="p-6">
                                <div class="text-xs text-neutral-400 mb-2">
                                    {{ \Carbon\Carbon::parse($item->tanggal ?? $item->created_at)->translatedFormat('d F Y') }}
                                </div>
                                <h3 class="text-lg font-medium text-white group-hover:text-[#829AB1] transition-colors line-clamp-2 leading-snug mb-3">
                                    {{ $item->judul }}
                                </h3>
                                <p class="text-xs text-neutral-300 font-light line-clamp-3 leading-relaxed">
                                    {!! Str::limit(strip_tags($item->konten ?? $item->deskripsi ?? ''), 120) !!}
                                </p>
                            </div>
                        </div>
                        <div class="p-6 pt-0">
                            <a href="{{ route('view-berita', $item->id) }}" class="inline-flex items-center gap-2 text-xs font-medium text-[#829AB1] hover:text-white hover:underline text-decoration-none">
                                <span>Baca Selengkapnya</span>
                                <iconify-icon icon="solar:arrow-right-linear" class="group-hover:translate-x-1 transition-transform"></iconify-icon>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="glass-panel bg-white/[0.03] backdrop-blur-xl border border-white/10 p-12 text-center rounded-2xl text-neutral-400 text-sm">
                    Belum ada berita yang dipublikasikan saat ini.
                </div>
            @endif
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

    <section id="mitra" class="relative py-24 px-6 md:px-12 bg-transparent overflow-hidden">
        <!-- Background Image (img/sesion5.png) -->
        <img 
            src="{{ asset('img/sesion5.png') }}" 
            alt="Mitra Background" 
            class="absolute inset-0 w-full h-full object-cover object-center pointer-events-none select-none z-0 opacity-55 brightness-95"
        />
        <!-- Progressive Darkening Gradient Layer 4: Deep dark blend into footer -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/65 via-black/75 to-black/85 pointer-events-none z-0"></div>

        <div class="relative z-10 max-w-7xl mx-auto">
            <!-- Section Header -->
            <div class="text-center max-w-2xl mx-auto mb-16 io">
                <div class="inline-flex items-center gap-2 text-xs uppercase tracking-widest text-[#829AB1] font-medium mb-3">
                    <span class="w-2 h-2 rounded-full bg-[#243B53]"></span>
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
                    <div class="glass-panel bg-white/[0.03] backdrop-blur-md border border-white/10 p-3.5 rounded-xl flex items-center justify-center h-24 hover:border-[#486581] hover:bg-white/[0.08] transition-all duration-300 group shadow-lg io">
                        <img 
                            src="{{ asset('images/logo_instansi/' . $logo) }}" 
                            alt="{{ pathinfo($logo, PATHINFO_FILENAME) }}" 
                            loading="lazy"
                            class="max-h-12 max-w-[110px] object-contain opacity-80 group-hover:opacity-100 group-hover:scale-105 transition-all duration-300"
                        />
                    </div>
                    @endforeach
                </div>
            @elseif(isset($partner) && $partner->count() > 0)
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4 items-center">
                    @foreach ($partner as $p)
                    <div class="glass-panel bg-white/[0.03] backdrop-blur-md border border-white/10 p-4 rounded-xl flex items-center justify-center h-24 hover:border-[#486581] hover:bg-white/[0.08] transition-all duration-300 group shadow-lg">
                        @if($p->foto)
                            <img src="{{ asset('images/kerjasama/' . $p->foto) }}" alt="{{ $p->instansi }}" class="max-h-12 max-w-[120px] object-contain opacity-80 group-hover:opacity-100 transition-opacity">
                        @else
                            <span class="text-xs text-neutral-300 font-light text-center">{{ $p->instansi }}</span>
                        @endif
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

@endsection
