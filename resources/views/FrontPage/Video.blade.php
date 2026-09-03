@extends('Partials.Frontpage')
@section('title', 'Gallery Video')

@section('content')
<section class="py-12 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 lg:px-8">
        
        <!-- Header -->
        <div class="mb-8 io">
            <span class="text-xs font-mono text-action uppercase tracking-widest block mb-2">MEDIA ARCHIVE // VIDEO GALLERY</span>
            <h2 class="text-3xl sm:text-5xl font-anybody font-extrabold uppercase text-snow">GALLERY VIDEO ALUMNI</h2>
            <p class="text-sm text-snow/70 font-archivo mt-2">Koleksi dokumentasi video kegiatan alumni &amp; tayangan liputan Universitas Methodist Indonesia.</p>
        </div>

        <!-- Video Grid -->
        @if ($data->isEmpty())
            <div class="bg-surface border border-line p-12 text-center font-mono text-xs text-snow/50 io">
                <i class="fa-solid fa-video text-2xl text-snow/30 mb-3 block"></i>
                BELUM ADA VIDEO GALLERY DITERBITKAN
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 io">
                @foreach ($data as $item)
                    <div class="bg-surface border border-line overflow-hidden hover:border-action transition-all group relative">
                        <div class="relative h-56 w-full overflow-hidden bg-ground">
                            <img src="{{ asset('images/thumbnail/' . $item->file) }}" 
                                 alt="{{ $item->judul }}" 
                                 class="w-full h-full object-cover plate-filter group-hover:scale-105 transition-transform duration-500" 
                                 loading="lazy">
                            <a href="{{ $item->link }}" data-fancybox="video-gallery" class="absolute inset-0 bg-ground/50 flex items-center justify-center text-action hover:text-snow transition-colors">
                                <div class="w-16 h-16 rounded-full bg-ground/80 border-2 border-action flex items-center justify-center text-action text-2xl group-hover:scale-110 transition-transform">
                                    <i class="fa-solid fa-play"></i>
                                </div>
                            </a>
                        </div>
                        <div class="p-4 font-anybody font-bold text-base text-snow uppercase truncate">
                            {{ $item->judul }}
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <script>
        Fancybox.bind("[data-fancybox]", {
            // Fancybox video options
        });
    </script>
@endpush
