<!DOCTYPE html>
<html lang="id" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Alumni - SIKAK UMI</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anybody:ital,wdth,wght@0,50..150,100..900;1,50..150,100..900&family=Archivo:ital,wght@0,300..900;1,300..900&family=Martian+Mono:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- FontAwesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

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
</head>

<body class="bg-ground text-snow font-archivo antialiased min-h-screen flex flex-col justify-between relative overflow-x-hidden selection:bg-action selection:text-white">

    <!-- Hero Background Plate -->
    <div class="fixed inset-0 z-0 overflow-hidden pointer-events-none">
        <img src="{{ asset('img/graduate.jpg') }}" 
             alt="Graduation UMI" 
             class="w-full h-full object-cover object-center filter saturate-125 contrast-115 brightness-90 opacity-20">
        <div class="absolute inset-0 bg-gradient-to-t from-ground via-ground/80 to-ground/60"></div>
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,rgba(46,94,153,0.12),transparent_70%)]"></div>
    </div>

    <!-- Header Navigation -->
    <header class="relative z-10 w-full border-b border-line px-4 lg:px-12 py-4 bg-ground/80 backdrop-blur-md">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <a href="{{ route('main') }}" class="flex items-center gap-2 text-decoration-none group">
                <span class="w-3 h-3 rounded-full bg-action animate-pulse"></span>
                <span class="font-anybody font-black text-xl sm:text-2xl tracking-tighter text-snow uppercase">SIKAK<span class="text-action">UMI</span></span>
            </a>
            <a href="{{ route('main') }}" class="font-mono text-xs text-snow/70 hover:text-action transition-colors text-decoration-none flex items-center gap-2">
                <i class="fa-solid fa-arrow-left"></i>
                <span class="hidden sm:inline">KEMBALI KE LANDING PAGE</span>
            </a>
        </div>
    </header>

    <!-- Main Auth Form Container -->
    <main class="relative z-10 flex-1 flex items-center justify-center p-4 sm:p-6 my-8">
        <div class="w-full max-w-lg bg-surface/90 border border-line p-6 sm:p-10 backdrop-blur-md shadow-2xl relative">
            <div class="absolute -top-3 left-6 px-3 py-0.5 bg-action text-white font-mono text-[10px] uppercase font-bold tracking-widest">
                AUTHENTICATION // REGISTRATION
            </div>

            <div class="mb-8">
                <div class="flex items-center gap-3 mb-2">
                    <img src="{{ asset('static/photos/LOGO UMI.png') }}" class="h-10 w-auto" alt="Logo UMI">
                    <h1 class="font-anybody font-black text-2xl sm:text-3xl uppercase text-snow">
                        SIGN <span class="text-action">UP</span>
                    </h1>
                </div>
                <p class="text-xs text-snow/60 font-mono">
                    Pendaftaran akun alumni resmi Universitas Methodist Indonesia untuk penelusuran karir &amp;tracer study.
                </p>
            </div>

            <form action="{{ route('register') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block font-mono text-xs text-snow/80 uppercase mb-1.5">
                        <i class="fa-solid fa-user text-action me-1.5"></i> NAMA LENGKAP
                    </label>
                    <input type="text" 
                           name="name" 
                           value="{{ old('name') }}" 
                           required 
                           autofocus
                           placeholder="Masukkan Nama Lengkap" 
                           class="w-full bg-ground border border-line px-4 py-2.5 text-snow font-mono text-xs focus:border-action focus:outline-none focus:ring-1 focus:ring-action transition-all placeholder-snow/30">
                    @error('name')
                        <p class="text-alert font-mono text-[11px] mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block font-mono text-xs text-snow/80 uppercase mb-1.5">
                        <i class="fa-solid fa-id-card text-action me-1.5"></i> NPM (NOMOR POCOK MAHASISWA)
                    </label>
                    <input type="text" 
                           name="npm" 
                           value="{{ old('npm') }}" 
                           required 
                           placeholder="Masukkan NPM" 
                           class="w-full bg-ground border border-line px-4 py-2.5 text-snow font-mono text-xs focus:border-action focus:outline-none focus:ring-1 focus:ring-action transition-all placeholder-snow/30">
                    @error('npm')
                        <p class="text-alert font-mono text-[11px] mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block font-mono text-xs text-snow/80 uppercase mb-1.5">
                        <i class="fa-solid fa-envelope text-action me-1.5"></i> EMAIL ADDRESS
                    </label>
                    <input type="email" 
                           name="email" 
                           value="{{ old('email') }}" 
                           required 
                           placeholder="nama@methodist.ac.id" 
                           class="w-full bg-ground border border-line px-4 py-2.5 text-snow font-mono text-xs focus:border-action focus:outline-none focus:ring-1 focus:ring-action transition-all placeholder-snow/30">
                    @error('email')
                        <p class="text-alert font-mono text-[11px] mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block font-mono text-xs text-snow/80 uppercase mb-1.5">
                        <i class="fa-solid fa-lock text-action me-1.5"></i> PASSWORD
                    </label>
                    <input type="password" 
                           name="password" 
                           required 
                           placeholder="Masukkan Password (Min 8 Karakter)" 
                           class="w-full bg-ground border border-line px-4 py-2.5 text-snow font-mono text-xs focus:border-action focus:outline-none focus:ring-1 focus:ring-action transition-all placeholder-snow/30">
                    @error('password')
                        <p class="text-alert font-mono text-[11px] mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block font-mono text-xs text-snow/80 uppercase mb-1.5">
                        <i class="fa-solid fa-shield-check text-action me-1.5"></i> KONFIRMASI PASSWORD
                    </label>
                    <input type="password" 
                           name="password_confirmation" 
                           required 
                           placeholder="Ulangi Password" 
                           class="w-full bg-ground border border-line px-4 py-2.5 text-snow font-mono text-xs focus:border-action focus:outline-none focus:ring-1 focus:ring-action transition-all placeholder-snow/30">
                </div>

                <div class="pt-3">
                    <button type="submit" class="w-full bg-action text-white font-anybody font-bold text-xs uppercase tracking-wider py-3.5 hover:bg-action/90 transition-all text-center border border-action cursor-pointer">
                        <i class="fa-solid fa-user-plus me-2"></i> BUAT AKUN ALUMNI
                    </button>
                </div>
            </form>

            <div class="mt-8 pt-6 border-t border-line text-center font-mono text-xs text-snow/60">
                SUDAH PUNYA AKUN? 
                <a href="{{ route('login') }}" class="text-action font-bold hover:underline ml-1 text-decoration-none">
                    LOGIN DISINI &rarr;
                </a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="relative z-10 w-full py-4 border-t border-line text-center font-mono text-[11px] text-snow/40 bg-ground/80 backdrop-blur-md">
        &copy; 2026 SIKAK UMI // UNIVERSITAS METHODIST INDONESIA
    </footer>

    @include('sweetalert::alert')
</body>

</html>
