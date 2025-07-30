@extends('backend/layout/main')

@section('content')
<div class="container-fluid mt-4">
    <h4 class="mb-4">Profil Pengguna</h4>

    @if (session('pesan'))
        <div class="alert alert-{{ session('pesan')[0] }} alert-dismissible fade show" role="alert">
            {{ session('pesan')[1] }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow border-0 rounded-4">
        <div class="card-body p-4">
            <div class="row mb-3">
                <div class="col-md-3 fw-semibold">Nama Lengkap</div>
                <div class="col-md-9">{{ Auth::user()->name }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 fw-semibold">Email</div>
                <div class="col-md-9">{{ Auth::user()->email }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 fw-semibold">Role</div>
                <div class="col-md-9">{{ Auth::user()->role ?? '-' }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 fw-semibold">Tanggal Akun Dibuat</div>
                <div class="col-md-9">{{ Auth::user()->created_at->format('d M Y') }}</div>
            </div>

            <a href="{{ route('user.ubah', Auth::user()->id) }}" class="btn btn-primary mt-3">
                <i class="bi bi-pencil-square"></i> Edit Profil
            </a>
        </div>
    </div>
</div>
@endsection
