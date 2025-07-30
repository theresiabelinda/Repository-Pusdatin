@extends('frontend.layout.main')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow rounded-4 border-0">
                <div class="card-header rounded-top-4" style="background-color: #003366;">
                    <h4 class="mb-0 text-white text-center"> Tambah Data Surat </h4>
                </div>
                <div class="card-body p-4">

                    {{-- Notifikasi pesan --}}
                    @if (session('pesan'))
                        <div class="alert alert-{{ session('pesan')[0] }} alert-dismissible fade show" role="alert">
                            {{ session('pesan')[1] }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('frontend.sk.proses') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="penerima" class="form-label fw-semibold">Nama Dosen</label>
                            <select name="penerima" id="penerima" class="form-select @error('penerima') is-invalid @enderror" required>
                                <option value="">-- Pilih Dosen --</option>
                                @foreach ($dosen as $item)
                                <option value="{{ $item->nama }}" {{ old('penerima') == $item->nama ? 'selected' : '' }}>
                                    {{ $item->nama }} 
                                </option>
                                @endforeach
                            </select>
                            @error('penerima')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="no_surat" class="form-label fw-semibold">Nomor Surat</label>
                            <input type="text" name="no_surat" class="form-control" required
                                placeholder="Contoh: 123/ABC/2025">
                        </div>

                        <div class="mb-3">
                            <label for="id_periode" class="form-label fw-semibold">Periode Akademik</label>
                            <select name="id_periode" class="form-select" required>
                                <option value="">-- Pilih Periode --</option>
                                @foreach ($periode as $item)
                                    <option value="{{ $item->id_periode }}">{{ $item->jenis_periode }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_surat" class="form-label fw-semibold">Tanggal Surat</label>
                            <input type="date" name="tanggal_surat" id="tanggal_surat"
                                class="form-control @error('tanggal_surat') is-invalid @enderror"
                                value="{{ old('tanggal_surat') }}">
                            @error('tanggal_surat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="perihal" class="form-label fw-semibold">Perihal</label>
                            <input type="text" name="perihal" id="perihal"
                                class="form-control @error('perihal') is-invalid @enderror"
                                value="{{ old('perihal') }}" placeholder="Contoh: Penugasan Mengajar">
                            @error('perihal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="id_kategori" class="form-label fw-semibold">Kategori Surat</label>
                            <select name="id_kategori"
                                class="form-select @error('id_kategori') is-invalid @enderror" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->id_kategori }}">{{ $item->nama_kategori }}</option>
                                @endforeach
                            </select>
                            @error('id_kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="file" class="form-label fw-semibold">Upload File PDF</label>
                            <input type="file" name="file" id="file" accept="application/pdf"
                                class="form-control @error('file') is-invalid @enderror">
                            @error('file')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">*Hanya file berformat PDF yang diterima.</small>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success rounded-3 px-4">
                                <i class="bi bi-upload"></i> Submit Data
                            </button>
                            <a href="{{ url('/') }}" class="btn btn-secondary rounded-3 px-4">
                                Kembali ke Halaman Utama
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
