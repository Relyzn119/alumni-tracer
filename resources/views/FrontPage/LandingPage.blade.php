@extends('Partials.Frontpage')
@section('title', 'Home')
@section('content')

    <!-- SECTION 1 - COVER / HERO -->
    <section class="relative min-h-screen w-full flex flex-col justify-between pt-3 pb-8 px-4 lg:px-12 overflow-hidden border-b border-line">
        <!-- Z-0: Hero Background Plate -->
        <div class="absolute inset-0 z-0 overflow-hidden">
            <img src="{{ asset('img/graduate.jpg') }}" 
                 alt="Graduation UMI" 
                 class="hero-plate-img w-full h-full object-cover object-center plate-filter opacity-40">
            <div class="absolute inset-0 bg-gradient-to-t from-ground via-ground/60 to-transparent"></div>
        </div>

        <!-- Metadata Header (Above Green Beam Bar) -->
        <div class="relative z-10 w-full max-w-7xl mx-auto pt-1 pb-2">
            <div class="hero-furniture flex flex-wrap items-center justify-between text-xs font-mono text-snow/70">
                <div class="flex items-center gap-3">
                    <span class="text-action">SIKAK UMI // OFFICIAL PORTAL</span>
                    <span>//</span>
                    <span>UNIVERSITAS METHODIST INDONESIA</span>
                </div>
                <div class="tnum">ACCREDITED // GRADE A INSTITUTION</div>
            </div>
        </div>

        <!-- Z-4: Timing Beam Bar (Green Line below Metadata Header) -->
        <div class="relative z-40 w-full h-1 bg-action beam-bar mb-2"></div>

        <!-- HERO CONTENT CONTAINER -->
        <div class="relative z-10 w-full max-w-7xl mx-auto flex-1 flex flex-col justify-end pb-12 pt-6">
            
            <!-- Z-1: Giant Wordmark Mask -->
            <div class="relative z-10 overflow-hidden my-4">
                <h1 class="hero-wordmark-inner text-[11vw] sm:text-[12vw] font-anybody font-black uppercase text-snow tracking-tighter leading-none select-none">
                    SIKAK<span class="text-action">UMI</span>
                </h1>
            </div>

            <p class="hero-furniture text-sm sm:text-lg text-snow/80 max-w-2xl font-archivo mb-8">
                Sistem Informasi Kemahasiswaan, Alumni, dan Kerjasama. Platform terintegrasi penelusuran rekam jejak karir alumni &amp; akreditasi institusi Universitas Methodist Indonesia.
            </p>

            <!-- HERO STATS COUNTER GRID (Z-3) -->
            <div class="hero-furniture relative z-30 grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-8 pt-6 border-t border-line">
                <div class="bg-surface/80 border border-line p-4 backdrop-blur-sm">
                    <span class="text-[10px] font-mono text-snow/50 uppercase block mb-1">TOTAL ALUMNI</span>
                    <span class="font-mono text-3xl font-bold text-action tnum counter" data-target="12450">0</span>
                    <span class="text-xs text-snow/40 ml-1">LULUSAN</span>
                </div>
                <div class="bg-surface/80 border border-line p-4 backdrop-blur-sm">
                    <span class="text-[10px] font-mono text-snow/50 uppercase block mb-1">PROGRAM STUDI</span>
                    <span class="font-mono text-3xl font-bold text-snow tnum counter" data-target="14">0</span>
                    <span class="text-xs text-snow/40 ml-1">PRODI ACTIVE</span>
                </div>
                <div class="bg-surface/80 border border-line p-4 backdrop-blur-sm">
                    <span class="text-[10px] font-mono text-snow/50 uppercase block mb-1">TRACER PLACEMENT</span>
                    <span class="font-mono text-3xl font-bold text-snow tnum counter" data-target="94">0</span>
                    <span class="text-xs text-snow/40 ml-1">% KERJA &lt; 6 BLN</span>
                </div>
                <div class="bg-surface/80 border border-line p-4 backdrop-blur-sm">
                    <span class="text-[10px] font-mono text-snow/50 uppercase block mb-1">MITRA KERJASAMA</span>
                    <span class="font-mono text-3xl font-bold text-alert tnum counter" data-target="{{ $partner->count() > 0 ? $partner->count() : 45 }}">0</span>
                    <span class="text-xs text-snow/40 ml-1">PERUSAHAAN</span>
                </div>
            </div>
        </div>

        <!-- Decorative Grid Ticks -->
        <div class="hero-ticks absolute left-4 bottom-4 z-30 font-mono text-[9px] text-snow/30 hidden sm:block">
            SYSTEM TELEMETRY // LAT 3.5898° N, LONG 98.6738° E
        </div>
    </section>

    <!-- SECTION 2 - THE FACE (STICKY SCROLL TRACER JOURNEY) -->
    <section id="face-section" class="relative w-full h-[220vh] border-b border-line">
        <div class="sticky top-0 left-0 w-full h-screen overflow-hidden flex flex-col justify-between p-6 lg:p-12">
            <!-- Background Image Container -->
            <div class="absolute inset-0 z-0">
                <img id="face-bg" src="{{ asset('img/graduate.jpg') }}" 
                     alt="Tracer Journey" 
                     class="w-full h-full object-cover plate-filter transition-all duration-700 opacity-25">
                <div class="absolute inset-0 bg-gradient-to-r from-ground via-ground/90 to-transparent"></div>
            </div>

            <!-- Sticky Header HUD -->
            <div class="relative z-10 flex items-center justify-between border-b border-line pb-4">
                <div>
                    <span class="text-xs font-mono text-action uppercase tracking-widest block">SECTION 02 // ALUMNI TRACER MILESTONE</span>
                    <h2 class="text-2xl sm:text-4xl font-anybody font-extrabold uppercase text-snow">ALUMNI CAREER JOURNEY</h2>
                </div>
                <div class="font-mono text-xs text-snow/60 tnum">
                    STAGE PROGRESS: <span id="face-progress-num" class="text-action font-bold">0%</span>
                </div>
            </div>

            <!-- Main Content Card -->
            <div class="relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-8 items-center my-auto">
                <div class="lg:col-span-1 hidden lg:flex flex-col items-center gap-2">
                    <div class="w-1 h-64 bg-line relative rounded-full overflow-hidden">
                        <div id="face-gauge-bar" class="w-full bg-action absolute top-0 left-0 transition-all duration-150" style="height: 0%;"></div>
                    </div>
                    <span class="font-mono text-[10px] text-snow/50 tnum">UMI 2026</span>
                </div>

                <div class="lg:col-span-8 bg-surface/90 border border-line p-6 lg:p-10 backdrop-blur-md max-w-3xl">
                    <div class="flex items-center gap-3 mb-4">
                        <span id="face-section-badge" class="px-2.5 py-1 bg-action/10 text-action font-mono text-xs border border-action/30">
                            STAGE 01 / 05
                        </span>
                        <span id="face-alt" class="font-mono text-xs text-snow/60 tnum">PRODI DATA INTEGRATION</span>
                    </div>
                    <h3 id="face-title" class="text-3xl sm:text-5xl font-anybody font-black uppercase text-snow mb-4">
                        REGISTRASI ALUMNI
                    </h3>
                    <p id="face-desc" class="text-sm sm:text-base text-snow/80 leading-relaxed font-archivo mb-6">
                        Mahasiswa yang lulus dari sidang meja hijau mendaftarkan akun alumni secara resmi di portal SIKAK UMI dengan melengkapi berkas Ijazah, KTP, dan foto formal wisudawan.
                    </p>
                    <div class="grid grid-cols-2 gap-4 pt-4 border-t border-line font-mono text-xs">
                        <div>REQ ACCURACY: <span id="face-speed" class="text-action tnum font-bold">100% VERIFIED</span></div>
                        <div>STATUS: <span id="face-gradient" class="text-alert tnum font-bold">OPEN REGISTRATION</span></div>
                    </div>
                </div>
            </div>

            <!-- Checkpoint Pills -->
            <div class="relative z-10 flex items-center justify-between overflow-x-auto gap-4 pt-4 border-t border-line">
                <div class="checkpoint-pill font-mono text-xs px-3 py-1.5 border border-line text-snow/50 transition-colors" data-step="0">01. REGISTRASI</div>
                <div class="checkpoint-pill font-mono text-xs px-3 py-1.5 border border-line text-snow/50 transition-colors" data-step="1">02. VERIFIKASI</div>
                <div class="checkpoint-pill font-mono text-xs px-3 py-1.5 border border-line text-snow/50 transition-colors" data-step="2">03. TRACER STUDY</div>
                <div class="checkpoint-pill font-mono text-xs px-3 py-1.5 border border-line text-snow/50 transition-colors" data-step="3">04. JEJAK KARIR</div>
                <div class="checkpoint-pill font-mono text-xs px-3 py-1.5 border border-line text-snow/50 transition-colors" data-step="4">05. MITRA KARIR</div>
            </div>
        </div>
    </section>

    <!-- SECTION 3 - THE TRACE (TELEMETRY STATISTICS CHART) -->
    <section class="relative w-full py-24 px-4 lg:px-12 border-b border-line bg-surface/40">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12 io">
                <div>
                    <span class="text-xs font-mono text-action uppercase tracking-widest block mb-2">SECTION 03 // ALUMNI EMPLOYMENT ACCELERATION</span>
                    <h2 class="text-3xl sm:text-5xl font-anybody font-extrabold uppercase text-snow">CAREER VELOCITY TELEMETRY</h2>
                </div>
                <div class="font-mono text-xs text-snow/60 max-w-xs">
                    BENCHMARK: UMI GRADUATES <br>
                    AVG TIME TO FIRST JOB: <span class="text-action tnum">2.4 MONTHS</span>
                </div>
            </div>

            <div class="relative bg-ground border border-line p-4 sm:p-8 overflow-hidden io">
                <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,rgba(46,94,153,0.08),transparent_60%)]"></div>
                
                <svg viewBox="0 0 1200 460" class="w-full h-auto relative z-10 overflow-visible">
                    <line x1="80" y1="80" x2="1120" y2="80" stroke="rgba(238,243,248,0.08)" stroke-dasharray="4 4" />
                    <line x1="80" y1="160" x2="1120" y2="160" stroke="rgba(238,243,248,0.08)" stroke-dasharray="4 4" />
                    <line x1="80" y1="240" x2="1120" y2="240" stroke="rgba(238,243,248,0.08)" stroke-dasharray="4 4" />
                    <line x1="80" y1="320" x2="1120" y2="320" stroke="rgba(238,243,248,0.08)" stroke-dasharray="4 4" />

                    <text x="50" y="85" fill="rgba(238,243,248,0.4)" font-family="Martian Mono" font-size="12">100%</text>
                    <text x="50" y="165" fill="rgba(238,243,248,0.4)" font-family="Martian Mono" font-size="12">75%</text>
                    <text x="50" y="245" fill="rgba(238,243,248,0.4)" font-family="Martian Mono" font-size="12">50%</text>
                    <text x="50" y="325" fill="rgba(238,243,248,0.4)" font-family="Martian Mono" font-size="12">25%</text>

                    <path id="telemetry-path" class="trace-path io" 
                          d="M80 392 C 150 340, 190 262, 240 200 C 300 128, 330 158, 370 214 C 400 258, 430 206, 470 172 C 540 112, 610 126, 690 154 C 760 180, 800 154, 860 124 C 930 90, 1000 66, 1120 56" 
                          fill="none" stroke="#2E5E99" stroke-width="4" stroke-linecap="round" />

                    <g transform="translate(240, 200)">
                        <circle r="6" fill="#2E5E99" />
                        <text x="12" y="-12" fill="#2E5E99" font-family="Martian Mono" font-size="11" font-weight="bold">68% EMPLOYED (&lt; 3 MOS)</text>
                    </g>
                    <g transform="translate(690, 154)">
                        <circle r="6" fill="#FF6B3D" />
                        <text x="12" y="-12" fill="#FF6B3D" font-family="Martian Mono" font-size="11" font-weight="bold">88% IN-FIELD MATCH</text>
                    </g>
                    <g transform="translate(1120, 56)">
                        <circle r="8" fill="#2E5E99" />
                        <text x="-180" y="-16" fill="#2E5E99" font-family="Martian Mono" font-size="12" font-weight="bold">94.8% TOTAL PLACEMENT</text>
                    </g>
                </svg>

                <div class="flex justify-between items-center mt-6 pt-4 border-t border-line font-mono text-xs text-snow/50">
                    <div>WISUDA [0 MOS]</div>
                    <div>SEMESTER 1 [3 MOS]</div>
                    <div>SEMESTER 2 [6 MOS]</div>
                    <div>SURVEY COMPLETION [12 MOS]</div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 4 - SPEED KIT / FEATURES (LAYANAN SIKAK UMI) -->
    <section class="relative w-full py-24 px-4 lg:px-12 border-b border-line">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12 io">
                <div>
                    <span class="text-xs font-mono text-action uppercase tracking-widest block mb-2">SECTION 04 // FEATURE PLATFORM</span>
                    <h2 class="text-3xl sm:text-5xl font-anybody font-extrabold uppercase text-snow">INTEGRATED SERVICES</h2>
                </div>
                <p class="text-sm text-snow/70 max-w-md font-archivo">
                    Layanan digital terpadu untuk pencarian data alumni, verifikasi surat akademik, pengisian kuesioner tracer study, dan portofolio karir.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 io">
                <!-- Feature 1: Data Alumni -->
                <a href="{{ route('pencarian') }}" class="bg-surface border border-line p-6 text-decoration-none group hover:border-action transition-all">
                    <div class="w-12 h-12 bg-action/10 border border-action/30 flex items-center justify-center text-action text-xl mb-4 group-hover:scale-110 transition-transform">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <span class="font-mono text-[10px] text-action uppercase tracking-widest block mb-1">DIRECTORY</span>
                    <h4 class="font-anybody font-bold text-xl uppercase text-snow mb-2 group-hover:text-action transition-colors">DATA ALUMNI</h4>
                    <p class="text-xs text-snow/70 leading-relaxed">
                        Pencarian database alumni lengkap berdasarkan NPM, Program Studi, Fakultas, dan tahun kelulusan.
                    </p>
                </a>

                <!-- Feature 2: Jejak Karir -->
                <a href="{{ route('jejak-karir.index') }}" class="bg-surface border border-line p-6 text-decoration-none group hover:border-action transition-all">
                    <div class="w-12 h-12 bg-action/10 border border-action/30 flex items-center justify-center text-action text-xl mb-4 group-hover:scale-110 transition-transform">
                        <i class="fa-solid fa-briefcase"></i>
                    </div>
                    <span class="font-mono text-[10px] text-action uppercase tracking-widest block mb-1">CAREER PORTFOLIO</span>
                    <h4 class="font-anybody font-bold text-xl uppercase text-snow mb-2 group-hover:text-action transition-colors">JEJAK KARIR</h4>
                    <p class="text-xs text-snow/70 leading-relaxed">
                        Rekam jejak riwayat pekerjaan dan posisi profesional alumni di berbagai instansi &amp; perusahaan nasional/multinasional.
                    </p>
                </a>

                <!-- Feature 3: Berita & Event -->
                <a href="{{ route('old-news') }}" class="bg-surface border border-line p-6 text-decoration-none group hover:border-action transition-all">
                    <div class="w-12 h-12 bg-action/10 border border-action/30 flex items-center justify-center text-action text-xl mb-4 group-hover:scale-110 transition-transform">
                        <i class="fa-solid fa-newspaper"></i>
                    </div>
                    <span class="font-mono text-[10px] text-action uppercase tracking-widest block mb-1">INFORMATION</span>
                    <h4 class="font-anybody font-bold text-xl uppercase text-snow mb-2 group-hover:text-action transition-colors">BERITA KAMPUS</h4>
                    <p class="text-xs text-snow/70 leading-relaxed">
                        Informasi terkini seputar kegiatan akademik, prestasi mahasiswa, agenda reuni, dan pengumuman alumni.
                    </p>
                </a>

                <!-- Feature 4: Lowongan Karir -->
                <a href="{{ route('lowongan') }}" class="bg-surface border border-line p-6 text-decoration-none group hover:border-action transition-all">
                    <div class="w-12 h-12 bg-action/10 border border-action/30 flex items-center justify-center text-action text-xl mb-4 group-hover:scale-110 transition-transform">
                        <i class="fa-solid fa-user-graduate"></i>
                    </div>
                    <span class="font-mono text-[10px] text-action uppercase tracking-widest block mb-1">JOB OPPORTUNITIES</span>
                    <h4 class="font-anybody font-bold text-xl uppercase text-snow mb-2 group-hover:text-action transition-colors">LOWONGAN KERJA</h4>
                    <p class="text-xs text-snow/70 leading-relaxed">
                        Informasi lowongan pekerjaan khusus fresh graduate &amp; pengalaman dari mitra perusahaan Universitas.
                    </p>
                </a>
            </div>
        </div>
    </section>

    <!-- SECTION 5 - BERITA TERKINI & NEWS ROSTER -->
    <section class="relative w-full py-24 px-4 lg:px-12 border-b border-line bg-surface/30">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12 io">
                <div>
                    <span class="text-xs font-mono text-action uppercase tracking-widest block mb-2">SECTION 05 // LATEST NEWS &amp; UPDATES</span>
                    <h2 class="text-3xl sm:text-5xl font-anybody font-extrabold uppercase text-snow">BERITA TERKINI</h2>
                </div>
                <a href="{{ route('old-news') }}" class="font-mono text-xs text-action hover:underline text-decoration-none">
                    VIEW ALL NEWS // MORE &rarr;
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 io">
                @forelse ($datas as $item)
                    <div class="bg-ground border border-line overflow-hidden group flex flex-col justify-between">
                        <div>
                            <div class="relative h-48 w-full overflow-hidden bg-surface">
                                <span class="absolute top-3 left-3 z-10 px-2.5 py-1 bg-action/20 text-action font-mono text-[10px] border border-action/30 uppercase">
                                    {{ $item->kategori->nama ?? 'BERITA' }}
                                </span>
                                <img src="{{ asset('images/berita/' . $item->file) }}" 
                                     alt="{{ $item->judul }}" 
                                     class="w-full h-full object-cover plate-filter group-hover:scale-105 transition-transform duration-500">
                            </div>
                            <div class="p-6">
                                <div class="font-mono text-[11px] text-snow/50 mb-2 tnum">
                                    PUBLISHED: {{ $item->created_at->diffForHumans() }}
                                </div>
                                <h4 class="font-anybody font-bold text-lg text-snow uppercase mb-3 line-clamp-2 group-hover:text-action transition-colors">
                                    {{ $item->judul }}
                                </h4>
                                <p class="text-xs text-snow/70 line-clamp-3 font-archivo leading-relaxed mb-4">
                                    {{ Str::limit(strip_tags($item['konten']), 90, '...') }}
                                </p>
                            </div>
                        </div>
                        <div class="p-6 pt-0">
                            <a href="/read/{{ $item->id }}" class="block w-full py-2.5 text-center border border-line text-snow font-mono text-xs uppercase group-hover:border-action group-hover:bg-action group-hover:text-white font-bold transition-all text-decoration-none">
                                BACA SELENGKAPNYA
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12 border border-line font-mono text-xs text-snow/50">
                        BELUM ADA DATA BERITA TERSEDIA
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- SECTION 6 - MITRA KERJASAMA CAROUSEL & PARTNERS -->
    <section class="relative w-full py-24 px-4 lg:px-12 border-b border-line">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12 io">
                <div>
                    <span class="text-xs font-mono text-action uppercase tracking-widest block mb-2">SECTION 06 // INSTITUTIONAL PARTNERSHIPS</span>
                    <h2 class="text-3xl sm:text-5xl font-anybody font-extrabold uppercase text-snow">MITRA KERJASAMA</h2>
                </div>
                <div class="font-mono text-xs text-snow/60">
                    NETWORK OF {{ $partner->count() > 0 ? $partner->count() : 45 }}+ RECOGNIZED PARTNER COMPANIES
                </div>
            </div>

            @if ($partner->isEmpty())
                <div class="bg-surface border border-line p-8 text-center font-mono text-xs text-snow/50 io">
                    DATA MITRA BELUM TERSEDIA
                </div>
            @else
                <div class="bg-surface border border-line p-6 lg:p-10 io">
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-8 items-center justify-center">
                        @foreach ($partner as $item)
                            <div class="p-4 bg-ground border border-line flex items-center justify-center h-24 hover:border-action transition-all">
                                <img src="{{ asset('images/logo_instansi/' . $item->foto) }}"
                                     alt="{{ $item->instansi }}" 
                                     class="max-h-16 max-w-full object-contain plate-filter grayscale hover:grayscale-0 transition-all">
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>

@endsection

@push('scripts')
    <script>
        // Counter Animation on Hero Mount
        document.querySelectorAll('.counter').forEach(el => {
            const target = parseInt(el.getAttribute('data-target'));
            if (!target) return;
            let current = 0;
            const duration = 1500;
            const step = Math.ceil(target / (duration / 16));
            
            setTimeout(() => {
                const timer = setInterval(() => {
                    current += step;
                    if (current >= target) {
                        el.textContent = target;
                        clearInterval(timer);
                    } else {
                        el.textContent = current;
                    }
                }, 16);
            }, 500);
        });

        // Sticky Scroll Tracer Journey (Section 02)
        const faceSection = document.getElementById('face-section');
        const faceBg = document.getElementById('face-bg');
        const faceGaugeBar = document.getElementById('face-gauge-bar');
        const faceProgressNum = document.getElementById('face-progress-num');

        const faceTitle = document.getElementById('face-title');
        const faceDesc = document.getElementById('face-desc');
        const faceAlt = document.getElementById('face-alt');
        const faceSpeed = document.getElementById('face-speed');
        const faceGradient = document.getElementById('face-gradient');
        const faceBadge = document.getElementById('face-section-badge');
        const pills = document.querySelectorAll('.checkpoint-pill');

        const checkpoints = [
            {
                badge: 'STAGE 01 / 05',
                alt: 'PRODI DATA INTEGRATION',
                title: 'REGISTRASI ALUMNI',
                desc: 'Mahasiswa yang lulus dari sidang meja hijau mendaftarkan akun alumni secara resmi di portal SIKAK UMI dengan melengkapi berkas Ijazah, KTP, dan foto formal wisudawan.',
                speed: '100% VERIFIED',
                gradient: 'OPEN REGISTRATION'
            },
            {
                badge: 'STAGE 02 / 05',
                alt: 'FAKULTAS VALIDATION',
                title: 'VERIFIKASI ADMIN',
                desc: 'Admin program studi dan fakultas memeriksa keabsahan dokumen akademik alumni untuk memberikan status kelulusan resmi.',
                speed: 'STATUS APPROVED',
                gradient: 'ADMIN VERIFIED'
            },
            {
                badge: 'STAGE 03 / 05',
                alt: 'KEMENRISTEKDIKTI COMPLIANCE',
                title: 'TRACER STUDY',
                desc: 'Alumni mengisikan kuesioner penelusuran karir mencakup masa tunggu kerja, tingkat keselarasan prodi, dan rentang pendapatan.',
                speed: 'STANDARD COMPLIANT',
                gradient: 'HIGH RESPONSE RATE'
            },
            {
                badge: 'STAGE 04 / 05',
                alt: 'PUBLIC PORTFOLIO',
                title: 'JEJAK KARIR ALUMNI',
                desc: 'Riwayat perjalanan karir alumni dipublikasikan secara transparan untuk memberikan inspirasi kepada mahasiswa aktif.',
                speed: 'PUBLIC VISIBILITY',
                gradient: 'VERIFIED PORTFOLIO'
            },
            {
                badge: 'STAGE 05 / 05',
                alt: 'INDUSTRIAL NETWORK',
                title: 'MITRA KERJASAMA',
                desc: 'Perusahaan mitra mengakses data rekrutmen alumni Universitas Methodist Indonesia untuk penempatan tenaga kerja profesional.',
                speed: 'DIRECT HIRING',
                gradient: 'ACTIVE COLLABORATION'
            }
        ];

        window.addEventListener('scroll', () => {
            if (!faceSection) return;
            const rect = faceSection.getBoundingClientRect();
            const sectionHeight = faceSection.offsetHeight - window.innerHeight;
            const scrollProgress = Math.max(0, Math.min(1, -rect.top / sectionHeight));

            const pct = Math.round(scrollProgress * 100);
            if (faceProgressNum) faceProgressNum.textContent = pct + '%';
            if (faceGaugeBar) faceGaugeBar.style.height = pct + '%';

            let index = Math.min(4, Math.floor(scrollProgress * 5));
            const cp = checkpoints[index];

            if (faceTitle && faceTitle.textContent !== cp.title) {
                faceTitle.textContent = cp.title;
                faceDesc.textContent = cp.desc;
                faceAlt.textContent = cp.alt;
                faceSpeed.textContent = cp.speed;
                faceGradient.textContent = cp.gradient;
                faceBadge.textContent = cp.badge;

                pills.forEach((p, idx) => {
                    if (idx === index) {
                        p.classList.add('border-action', 'text-action', 'bg-action/10');
                        p.classList.remove('border-line', 'text-snow/50');
                    } else {
                        p.classList.remove('border-action', 'text-action', 'bg-action/10');
                        p.classList.add('border-line', 'text-snow/50');
                    }
                });
            }
        });
    </script>
@endpush
