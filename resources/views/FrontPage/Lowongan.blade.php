@extends('Partials.Frontpage')
@section('title', 'Lowongan Karir')

@section('content')
<section class="py-24 min-h-[80vh] flex items-center justify-center relative overflow-hidden">
    <!-- Background Gradient -->
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,rgba(46,94,153,0.05),transparent_70%)]"></div>

    <div class="max-w-3xl mx-auto px-4 text-center relative z-10 io">
        <span class="px-3 py-1 bg-action/10 text-action font-mono text-xs border border-action/30 uppercase tracking-widest inline-block mb-4">
            TELEMETRY // CAREER OPPORTUNITIES
        </span>
        <h2 class="font-anybody font-black text-4xl sm:text-6xl uppercase text-snow mb-4">
            LOWONGAN KERJA &amp; REKRUTMEN
        </h2>
        <div class="font-mono text-xl sm:text-2xl text-action font-bold mb-6 tracking-widest tnum">
            COMING SOON
        </div>
        <p class="text-snow/70 font-archivo text-base max-w-lg mx-auto leading-relaxed mb-8">
            Portal lowongan pekerjaan khusus fresh graduate dan alumni Universitas Methodist Indonesia sedang dalam tahap penyiapan integrasi dengan mitra perusahaan.
        </p>
        <a href="{{ route('main') }}" class="inline-block bg-action text-white font-anybody font-bold text-xs uppercase px-8 py-3.5 hover:bg-action/90 transition-colors text-decoration-none">
            &larr; KEMBALI KE HOME
        </a>
    </div>
</section>
@endsection
