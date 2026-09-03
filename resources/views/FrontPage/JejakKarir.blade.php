@extends('Partials.Frontpage')
@section('title', 'Jejak Karir Alumni')
@section('content')
<section class="py-12 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 lg:px-8">
        
        <!-- Header -->
        <div class="mb-8 io">
            <span class="text-xs font-mono text-action uppercase tracking-widest block mb-2">TELEMETRY // ALUMNI CAREER TRACKING</span>
            <h2 class="text-3xl sm:text-5xl font-anybody font-extrabold uppercase text-snow">JEJAK KARIR ALUMNI</h2>
            <p class="text-sm text-snow/70 font-archivo mt-2">Daftar rekam jejak karir profesional lulusan Universitas Methodist Indonesia di industri nasional dan internasional.</p>
        </div>

        <!-- Search Container -->
        <div class="bg-surface border border-line p-6 mb-8 io shadow-2xl">
            <form action="{{ route('jejak-karir.index') }}" method="get">
                <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-center">
                    <div class="md:col-span-6">
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-snow/40">
                                <i class="fas fa-search"></i>
                            </span>
                            <input type="text" name="search" value="{{ request('search') }}"
                                class="w-full bg-ground border border-line text-snow placeholder-snow/40 font-mono text-xs pl-10 pr-4 py-3 focus:outline-none focus:border-action transition-colors"
                                placeholder="Cari jejak karir berdasarkan nama atau NPM...">
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
                            <i class="fa-solid fa-magnifying-glass me-1"></i> CARI KARIR
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Alumni Career Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12 io">
            @forelse ($datas as $item)
            @php
            $currentCareer = \App\Models\AlumniCareer::where('alumni_id', $item->id)->where('is_current', true)->first();
            $allCareers = \App\Models\AlumniCareer::where('alumni_id', $item->id)->orderBy('tahun_mulai', 'desc')->get();
            @endphp
            <div class="bg-surface border border-line overflow-hidden hover:border-action transition-all group flex flex-col justify-between">
                <div>
                    <div class="relative h-56 w-full overflow-hidden bg-ground">
                        <img src="{{ asset('images/alumni/' . ($item->file ?? 'default.png')) }}" 
                             alt="{{ $item->nama }}" 
                             class="w-full h-full object-cover plate-filter group-hover:scale-105 transition-transform duration-500">
                        <span class="absolute top-3 right-3 px-2.5 py-1 bg-action/20 text-action font-mono text-[10px] border border-action/30 uppercase tnum">
                            VERIFIED TRACER
                        </span>
                    </div>

                    <div class="p-6">
                        <h4 class="font-anybody font-bold text-xl uppercase text-snow mb-1 group-hover:text-action transition-colors">
                            {{ $item->nama }}
                        </h4>
                        <div class="font-mono text-xs text-snow/60 mb-4">
                            <i class="fa-solid fa-graduation-cap text-action me-1"></i> {{ $item->prodis->prodi ?? '-' }} ({{ $item->fakultas }})
                        </div>

                        <div class="border-t border-line pt-4 mb-4">
                            <span class="font-mono text-[10px] text-action uppercase tracking-widest block mb-1">PEKERJAAN SAAT INI</span>
                            @if($currentCareer)
                                <div class="font-anybody font-bold text-base text-snow uppercase">{{ $currentCareer->perusahaan }}</div>
                                <div class="font-mono text-xs text-snow/70">{{ $currentCareer->posisi_jabatan ?? 'Staf / Karyawan' }}</div>
                                <div class="mt-2 inline-block px-2 py-0.5 bg-surface-elevated border border-line font-mono text-[10px] text-snow/80">
                                    <i class="fa-solid fa-location-dot me-1 text-action"></i> {{ $currentCareer->lokasi ?? 'Indonesia' }}
                                </div>
                            @else
                                <span class="font-mono text-xs text-snow/40 italic">Belum ada data pekerjaan aktif</span>
                            @endif
                        </div>

                        @if($allCareers->count() > 1)
                        <div class="border-t border-line pt-3">
                            <span class="font-mono text-[10px] text-snow/50 uppercase tracking-widest block mb-1">RIWAYAT KARIR LAINNYA</span>
                            <ul class="space-y-1 p-0 m-0 list-none font-mono text-xs text-snow/70">
                                @foreach($allCareers->where('is_current', false)->take(2) as $oldCareer)
                                <li class="truncate">
                                    <i class="fa-solid fa-building me-1 text-action/60"></i> {{ $oldCareer->perusahaan }}
                                    @if($oldCareer->tahun_mulai)
                                    <span class="text-snow/40 tnum">({{ $oldCareer->tahun_mulai }})</span>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="p-6 pt-0 border-t border-line mt-4">
                    <div class="grid grid-cols-2 gap-2 font-mono text-xs pt-4 text-center">
                        <div class="border-r border-line pr-2">
                            <div class="text-snow font-bold tnum">
                                {{ $item->thn_lulus ?? ($item->yudisium ? \Carbon\Carbon::parse($item->yudisium)->format('Y') : '-') }}
                            </div>
                            <div class="text-snow/40 text-[10px]">TAHUN LULUS</div>
                        </div>
                        <div class="pl-2">
                            <div class="text-action font-bold tnum">{{ $allCareers->count() }} PERUSAHAAN</div>
                            <div class="text-snow/40 text-[10px]">TOTAL KARIR</div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 bg-surface border border-line p-12 text-center font-mono text-xs text-snow/50">
                <i class="fa-solid fa-user-slash text-2xl text-snow/30 mb-3 block"></i>
                BELUM ADA DATA JEJAK KARIR ALUMNI YANG DITEMUKAN
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