@extends('Partials.Frontpage')
@section('title', 'Gallery Foto')

@section('content')
<section class="py-12 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 lg:px-8">
        
        <!-- Header -->
        <div class="mb-8 io">
            <span class="text-xs font-mono text-action uppercase tracking-widest block mb-2">MEDIA ARCHIVE // PHOTO GALLERY</span>
            <h2 class="text-3xl sm:text-5xl font-anybody font-extrabold uppercase text-snow">GALLERY FOTO ALUMNI</h2>
            <p class="text-sm text-snow/70 font-archivo mt-2">Koleksi dokumentasi foto kegiatan alumni dan momen penting Universitas Methodist Indonesia.</p>
        </div>

        <!-- Gallery Grid -->
        @if ($data->isEmpty())
            <div class="bg-surface border border-line p-12 text-center font-mono text-xs text-snow/50 io">
                <i class="fa-solid fa-camera text-2xl text-snow/30 mb-3 block"></i>
                BELUM ADA FOTO GALLERY DITERBITKAN
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 io">
                @foreach ($data as $item)
                    <div class="bg-surface border border-line overflow-hidden hover:border-action transition-all group">
                        <a href="{{ asset('images/foto/' . $item->file) }}" data-fancybox="gallery" class="block relative h-64 overflow-hidden bg-ground">
                            <img src="{{ asset('images/foto/' . $item->file) }}" 
                                 alt="{{ $item->keterangan }}" 
                                 class="w-full h-full object-cover plate-filter group-hover:scale-105 transition-transform duration-500" 
                                 loading="lazy">
                            <div class="absolute inset-0 bg-ground/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center text-action text-2xl">
                                <i class="fa-solid fa-magnifying-glass-plus"></i>
                            </div>
                        </a>
                        <div class="p-4 font-mono text-xs text-snow/80">
                            {{ $item->keterangan }}
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
            // Fancybox options
        });
    </script>
@endpush
