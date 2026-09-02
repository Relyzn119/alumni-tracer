@extends('Partials.person')

@section('title', 'Alumni Tracer Study')

@section('content')
<div class="container-xl mt-4">
    <div class="card card-md text-center">
        <div class="card-body">
            <div class="mb-3">
                <span class="avatar avatar-xl bg-warning-lt rounded-circle">
                    <i class="fa-solid fa-lock text-warning fs-1"></i>
                </span>
            </div>
            <h2 class="h2">Akses Kuesioner Belum Tersedia</h2>
            <p class="text-secondary">
                Status Pengajuan Data Alumni Anda (NPM: <strong>{{ $alumni->npm }}</strong>) saat ini masih berstatus 
                <span class="badge bg-warning text-white">Pending / Menunggu Verifikasi</span>.
            </p>
            <p class="text-secondary mb-4">
                Anda baru dapat mengisi Kuesioner Tracer Study setelah data Alumni Anda diperiksa dan di-approve oleh Admin Universitas Methodist Indonesia.
            </p>
            <a href="{{ url('/home') }}" class="btn btn-primary">
                <i class="fa-solid fa-arrow-left me-2"></i> Kembali ke Dashboard Profile
            </a>
        </div>
    </div>
</div>
@endsection