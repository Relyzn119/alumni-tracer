@extends('Partials.Frontpage')
@section('title', $data->judul)
@section('content')
<section class="py-12 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- Article Body -->
            <article class="lg:col-span-8 bg-surface border border-line p-6 lg:p-10 io">
                <!-- Category Badge & Title -->
                <div class="mb-4">
                    <span class="px-3 py-1 bg-action/20 text-action font-mono text-xs border border-action/30 uppercase tracking-widest">
                        {{ $data->kategori->nama ?? 'BERITA' }}
                    </span>
                </div>

                <h1 class="font-anybody font-extrabold text-3xl sm:text-5xl uppercase text-snow mb-6 leading-tight">
                    {{ $data->judul }}
                </h1>

                <!-- Metadata Bar -->
                <div class="flex flex-wrap items-center gap-6 font-mono text-xs text-snow/60 border-y border-line py-4 mb-6">
                    <div class="flex items-center gap-2">
                        <i class="fa-regular fa-user text-action"></i>
                        <span>{{ $data->penulis }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-calendar-days text-action"></i>
                        <span class="tnum">{{ \Carbon\Carbon::parse($data->tanggal)->translatedFormat('d F Y') }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-tag text-action"></i>
                        <span>{{ $data->kategori->nama }}</span>
                    </div>
                </div>

                <!-- Featured Image -->
                <div class="relative w-full h-[380px] sm:h-[480px] overflow-hidden mb-8 bg-ground border border-line">
                    <img src="{{ asset('images/berita/' . $data->file) }}" 
                         alt="{{ $data->judul }}" 
                         class="w-full h-full object-cover plate-filter">
                </div>

                <!-- Share Buttons -->
                <div class="mb-8 p-4 bg-ground border border-line flex items-center justify-between">
                    <span class="font-mono text-xs text-snow/60 uppercase">SHARE THIS ARTICLE:</span>
                    <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                        <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                        <a class="a2a_button_facebook"></a>
                        <a class="a2a_button_whatsapp"></a>
                        <a class="a2a_button_threads"></a>
                        <a class="a2a_button_x"></a>
                        <a class="a2a_button_telegram"></a>
                    </div>
                    <script async src="https://static.addtoany.com/menu/page.js"></script>
                </div>

                <!-- Article Content Body -->
                <div class="text-snow/90 font-archivo text-base leading-relaxed space-y-4">
                    {!! $data->konten !!}
                </div>
            </article>

            <!-- Sidebar / Related News -->
            <aside class="lg:col-span-4 space-y-6 io">
                <div class="bg-surface border border-line p-6">
                    <span class="text-xs font-mono text-action uppercase tracking-widest block mb-2">TELEMETRY // LATEST UPDATES</span>
                    <h3 class="font-anybody font-bold text-2xl uppercase text-snow mb-4 border-b border-line pb-3">BERITA LAINNYA</h3>

                    <div class="space-y-6">
                        @forelse ($all as $item)
                            <div class="group border-b border-line pb-4 last:border-b-0 last:pb-0">
                                <div class="relative h-40 w-full overflow-hidden bg-ground mb-3 border border-line">
                                    <img src="{{ asset('images/berita/' . $item->file) }}" 
                                         alt="{{ $item->judul }}" 
                                         class="w-full h-full object-cover plate-filter group-hover:scale-105 transition-transform duration-500">
                                    <span class="absolute top-2 left-2 px-2 py-0.5 bg-action/20 text-action font-mono text-[9px] border border-action/30 uppercase">
                                        {{ $item->kategori->nama ?? 'BERITA' }}
                                    </span>
                                </div>
                                <h4 class="font-anybody font-bold text-sm text-snow uppercase mb-1 group-hover:text-action transition-colors">
                                    <a href="/read/{{ $item->id }}" class="text-decoration-none text-snow group-hover:text-action">
                                        {{ $item->judul }}
                                    </a>
                                </h4>
                                <div class="font-mono text-[10px] text-snow/40 tnum">
                                    {{ $item->created_at->diffForHumans() }}
                                </div>
                            </div>
                        @empty
                            <p class="font-mono text-xs text-snow/40 italic">Tidak ada berita lainnya</p>
                        @endforelse
                    </div>
                </div>
            </aside>

        </div>
    </div>
</section>
@endsection
