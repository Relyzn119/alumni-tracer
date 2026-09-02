@extends('Partials.Frontpage')

@section('title', 'Jejak Karir Alumni')

@section('content')
<section>
    <div class="container py-4 min-vh-100">
        <!-- Search Container -->
        <div class="bg-white rounded-3 shadow-sm p-4 mb-4">
            <form action="{{ route('jejak-karir.index') }}" method="get">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="fas fa-search text-muted"></i>
                            </span>
                            <input type="text" name="search" value="{{ request('search') }}"
                                class="form-control bg-light border-start-0"
                                placeholder="Cari jejak karir berdasarkan nama atau NPM...">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <select class="form-select bg-light" name="prodi">
                            <option value="">Semua Program Studi</option>
                            @foreach ($prodi as $item)
                            <option value="{{ $item->id }}"
                                {{ request('prodi') == $item->id ? 'selected' : '' }}>
                                {{ $item->prodi }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary w-100" type="submit">
                            <i class="fa-solid fa-magnifying-glass me-1"></i> Cari
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Alumni Career Cards -->
        <div class="row g-4 mb-5">
            @forelse ($datas as $item)
            @php
            // Ambil karir saat ini / terbaru dari alumni
            $currentCareer = \App\Models\AlumniCareer::where('alumni_id', $item->id)->where('is_current', true)->first();
            $allCareers = \App\Models\AlumniCareer::where('alumni_id', $item->id)->orderBy('tahun_mulai', 'desc')->get();
            @endphp
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="position-relative">
                        <img src="{{ asset('images/alumni/' . ($item->file ?? 'default.png')) }}"
                            width="400" height="280" class="card-img-top object-fit-cover" alt="Foto Alumni">
                        <span class="badge bg-success position-absolute top-0 end-0 m-3 px-3 py-2 shadow-sm">
                            Verified Tracer
                        </span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-primary mb-1">{{ $item->nama }}</h5>
                        <p class="card-text text-muted mb-2 small">
                            <i class="fa-solid fa-graduation-cap me-1"></i> {{ $item->prodis->prodi ?? '-' }} ({{ $item->fakultas }})
                        </p>

                        <hr class="my-3">

                        <!-- Karir Saat Ini -->
                        <div class="mb-3">
                            <small class="text-uppercase text-muted fw-bold d-block mb-1">Pekerjaan Saat Ini</small>
                            @if($currentCareer)
                            <div class="fw-bold text-dark fs-6">{{ $currentCareer->perusahaan }}</div>
                            <small class="text-secondary d-block">{{ $currentCareer->posisi_jabatan ?? 'Staf / Karyawan' }}</small>
                            <small class="badge bg-light text-dark mt-1 border"><i class="fa-solid fa-location-dot me-1"></i> {{ $currentCareer->lokasi ?? 'Indonesia' }}</small>
                            @else
                            <span class="text-muted fst-italic">Belum ada data pekerjaan aktif</span>
                            @endif
                        </div>

                        <!-- Riwayat Karir Sebelumnya -->
                        @if($allCareers->count() > 1)
                        <div>
                            <small class="text-uppercase text-muted fw-bold d-block mb-1">Riwayat Karir Sebelumnya</small>
                            <ul class="list-unstyled mb-0 small text-secondary">
                                @foreach($allCareers->where('is_current', false)->take(2) as $oldCareer)
                                <li class="mb-1">
                                    <i class="fa-solid fa-building me-1 text-muted"></i> {{ $oldCareer->perusahaan }}
                                    @if($oldCareer->tahun_mulai)
                                    <span class="text-muted">({{ $oldCareer->tahun_mulai }})</span>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                    <div class="card-footer bg-light border-0 py-3">
                        <div class="row text-center">
                            <div class="col-6 border-end">
                                <div class="fw-bold text-dark">
                                    {{ $item->thn_lulus ?? ($item->yudisium ? \Carbon\Carbon::parse($item->yudisium)->format('Y') : '-') }}
                                </div>
                                <small class="text-muted">Tahun Lulus</small>
                            </div>
                            <div class="col-6">
                                <div class="fw-bold text-dark">{{ $allCareers->count() }} Perusahaan</div>
                                <small class="text-muted">Total Karir</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <i class="fa-solid fa-user-slash text-muted fs-1 mb-3"></i>
                <h4 class="text-muted">Belum ada data Jejak Karir Alumni yang ditemukan.</h4>
            </div>
            @endforelse

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $datas->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</section>
@endsection