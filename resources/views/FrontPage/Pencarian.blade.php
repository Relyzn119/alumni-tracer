@extends('Partials.Frontpage')
@section('title', 'Data Alumni')
@section('content')
<section class="py-12 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 lg:px-8">
        
        <!-- Header -->
        <div class="mb-8 io">
            <span class="text-xs font-mono text-action uppercase tracking-widest block mb-2">DIRECTORY // DATABASE ALUMNI</span>
            <h2 class="text-3xl sm:text-5xl font-anybody font-extrabold uppercase text-snow">PENCARIAN DATA ALUMNI</h2>
            <p class="text-sm text-snow/70 font-archivo mt-2">Cari data rekam jejak lulusan Universitas Methodist Indonesia berdasarkan Nama, NPM, atau Program Studi.</p>
        </div>

        <!-- Search Container -->
        <div class="bg-surface border border-line p-6 mb-8 io shadow-2xl">
            <form action="{{ route('pencarian') }}" method="get">
                <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-center">
                    <div class="md:col-span-6">
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-snow/40">
                                <i class="fas fa-search"></i>
                            </span>
                            <input type="text" name="search" value="{{ request('search') }}"
                                class="w-full bg-ground border border-line text-snow placeholder-snow/40 font-mono text-xs pl-10 pr-4 py-3 focus:outline-none focus:border-action transition-colors"
                                placeholder="Cari berdasarkan nama atau NPM alumni...">
                        </div>
                    </div>
                    <div class="md:col-span-4">
                        <select name="prodi" class="w-full bg-ground border border-line text-snow font-mono text-xs px-4 py-3 focus:outline-none focus:border-action transition-colors">
                            <option value="">Semua Program Studi</option>
                            @foreach ($prodi as $item)
                            <option value="{{ $item->id }}" {{ request('prodi') == $item->id ? 'selected' : '' }}>
                                {{ $item->prodi }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="md:col-span-2">
                        <button class="w-full bg-action text-white font-anybody font-bold text-xs uppercase py-3 hover:bg-action/90 transition-colors" type="submit">
                            <i class="fa-solid fa-magnifying-glass me-1"></i> CARI DATA
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Alumni Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12 io">
            @forelse ($datas as $item)
            <div class="bg-surface border border-line overflow-hidden hover:border-action transition-all group flex flex-col justify-between">
                <div>
                    <div class="relative h-64 w-full overflow-hidden bg-ground">
                        <img src="{{ asset('images/alumni/' . ($item->file ?? 'default.png')) }}" 
                             alt="{{ $item->nama }}" 
                             class="w-full h-full object-cover plate-filter group-hover:scale-105 transition-transform duration-500">
                        <span class="absolute top-3 right-3 px-2.5 py-1 bg-action/20 text-action font-mono text-[10px] border border-action/30 uppercase tnum">
                            LULUS: {{ $item->thn_lulus ?? ($item->yudisium ? \Carbon\Carbon::parse($item->yudisium)->format('Y') : '-') }}
                        </span>
                    </div>

                    <div class="p-6">
                        <h4 class="font-anybody font-bold text-xl uppercase text-snow mb-1 group-hover:text-action transition-colors">
                            {{ $item->nama }}
                        </h4>
                        <div class="font-mono text-xs text-action mb-1">
                            {{ $item->prodis->prodi ?? '-' }}
                        </div>
                        <div class="font-mono text-[11px] text-snow/50 uppercase">
                            {{ $item->fakultas }}
                        </div>
                    </div>
                </div>

                <div class="p-6 pt-0 border-t border-line mt-4">
                    <div class="grid grid-cols-2 gap-2 font-mono text-xs pt-4 text-center">
                        <div class="border-r border-line pr-2">
                            <div class="text-snow font-bold tnum">{{ $item->npm }}</div>
                            <div class="text-snow/40 text-[10px]">NPM</div>
                        </div>
                        <div class="pl-2">
                            <div class="text-snow font-bold tnum">{{ $item->stambuk ?? '-' }}</div>
                            <div class="text-snow/40 text-[10px]">STAMBUK</div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 bg-surface border border-line p-12 text-center font-mono text-xs text-snow/50">
                <i class="fa-solid fa-users-slash text-2xl text-snow/30 mb-3 block"></i>
                TIDAK ADA DATA ALUMNI YANG DITEMUKAN
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