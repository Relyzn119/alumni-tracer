@extends('Partials.Frontpage')
@section('title', 'Berita Terkait')
@section('content')
<section class="py-12 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 lg:px-8">
        
        <!-- Header -->
        <div class="mb-8 io">
            <span class="text-xs font-mono text-action uppercase tracking-widest block mb-2">TELEMETRY // CAMPUS NEWS &amp; UPDATES</span>
            <h2 class="text-3xl sm:text-5xl font-anybody font-extrabold uppercase text-snow">BERITA KAMPUS &amp; ALUMNI</h2>
            <p class="text-sm text-snow/70 font-archivo mt-2">Kumpulan berita resmi, pengumuman kegiatan, dan prestasi alumni Universitas Methodist Indonesia.</p>
        </div>

        <!-- Search and Category Filter -->
        <div class="bg-surface border border-line p-6 mb-8 io shadow-2xl">
            <form action="{{ route('old-news') }}" method="GET">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-center">
                    <div class="md:col-span-6">
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-snow/40">
                                <i class="fas fa-search"></i>
                            </span>
                            <input type="text" name="search" class="w-full bg-ground border border-line text-snow placeholder-snow/40 font-mono text-xs pl-10 pr-4 py-3 focus:outline-none focus:border-action transition-colors"
                                   placeholder="Cari berita berdasarkan kata kunci..."
                                   value="{{ request('search') }}">
                        </div>
                    </div>
                    <div class="md:col-span-4">
                        <select name="category" class="w-full bg-ground border border-line text-snow font-mono text-xs px-4 py-3 focus:outline-none focus:border-action transition-colors">
                            <option value="">Semua Kategori Berita</option>
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}" {{ request('category') == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="md:col-span-2">
                        <button type="submit" class="w-full bg-action text-white font-anybody font-bold text-xs uppercase py-3 hover:bg-action/90 transition-colors">
                            <i class="fa-solid fa-magnifying-glass me-1"></i> CARI BERITA
                        </button>
                    </div>
                </div>
            </form>

            <!-- Category Pills Filter -->
            <div class="mt-6 pt-4 border-t border-line flex flex-wrap gap-2">
                <a href="{{ route('old-news') }}" 
                   class="font-mono text-xs px-3 py-1.5 border border-line text-decoration-none transition-colors {{ request('category') == '' ? 'border-action text-action bg-action/10' : 'text-snow/60 hover:text-snow' }}">
                   ALL CATEGORIES
                </a>
                @foreach ($kategori as $item)
                    <a href="{{ route('old-news', ['category' => $item->id]) }}" 
                       class="font-mono text-xs px-3 py-1.5 border border-line text-decoration-none transition-colors {{ request('category') == $item->id ? 'border-action text-action bg-action/10' : 'text-snow/60 hover:text-snow' }}">
                       {{ strtoupper($item->nama) }}
                    </a>
                @endforeach
            </div>
        </div>

        <!-- News List Grid -->
        <div class="space-y-6 mb-12 io">
            @forelse ($datas as $item)
                <div class="bg-surface border border-line overflow-hidden hover:border-action transition-all group">
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-0">
                        <div class="md:col-span-4 h-64 md:h-auto relative overflow-hidden bg-ground">
                            <img src="{{ asset('images/berita/' . $item->file) }}" 
                                 alt="{{ $item->judul }}" 
                                 class="w-full h-full object-cover plate-filter group-hover:scale-105 transition-transform duration-500">
                            <span class="absolute top-3 left-3 px-2.5 py-1 bg-action/20 text-action font-mono text-[10px] border border-action/30 uppercase">
                                {{ $item->kategori->nama ?? 'BERITA' }}
                            </span>
                        </div>
                        <div class="md:col-span-8 p-6 lg:p-8 flex flex-col justify-between">
                            <div>
                                <div class="font-mono text-xs text-snow/50 mb-2 tnum">
                                    <i class="fa-solid fa-clock me-1 text-action"></i> DIPUBLIKASIKAN: {{ $item->created_at->diffForHumans() }}
                                </div>
                                <h3 class="font-anybody font-bold text-2xl uppercase text-snow mb-3 group-hover:text-action transition-colors">
                                    {{ $item->judul }}
                                </h3>
                                <p class="text-sm text-snow/70 font-archivo leading-relaxed line-clamp-3 mb-6">
                                    {{ Str::limit(strip_tags($item['konten']), 160, '...') }}
                                </p>
                            </div>
                            <div>
                                <a href="/read/{{ $item->id }}" class="inline-block bg-action text-white font-anybody font-bold text-xs uppercase px-6 py-2.5 hover:bg-action/90 transition-colors text-decoration-none">
                                    BACA SELENGKAPNYA &rarr;
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-surface border border-line p-12 text-center font-mono text-xs text-snow/50">
                    BELUM ADA BERITA TERSEDIA
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="flex justify-center io">
            {{ $datas->links('pagination::bootstrap-5') }}
        </div>
    </div>
</section>
@endsection
