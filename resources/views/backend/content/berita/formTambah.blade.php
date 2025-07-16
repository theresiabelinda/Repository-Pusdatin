@extends('backend.layout.main')

@section('content')
    <div class="container mt-4">
        <h2>Tambah Surat Keputusan</h2>

        {{-- Notifikasi pesan --}}
        @if (session('pesan'))
            <div class="alert alert-{{ session('pesan')[0] }}">
                {{ session('pesan')[1] }}
            </div>
        @endif

        {{-- Form Tambah --}}
        <form action="{{ route('berita.prosesTambah') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="no_surat" class="form-label">Nomor Surat</label>
                <input type="text" name="no_surat" id="no_surat"
                    class="form-control @error('no_surat') is-invalid @enderror" value="{{ old('no_surat') }}">
                @error('no_surat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="id_periode">Periode Akademik</label>
                <select name="id_periode" class="form-control @error('id_periode') is-invalid @enderror" required>
                    <option value="">-- Pilih Periode --</option>
                    @foreach ($periode as $item)
                        <option value="{{ $item->id_periode }}">{{ $item->jenis_periode }}</option>
                    @endforeach
                </select>
                @error('id_periode')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tanggal_surat" class="form-label">Tanggal Surat</label>
                <input type="date" name="tanggal_surat" id="tanggal_surat"
                    class="form-control @error('tanggal_surat') is-invalid @enderror" value="{{ old('tanggal_surat') }}">
                @error('tanggal_surat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="perihal" class="form-label">Perihal</label>
                <input type="text" name="perihal" id="perihal"
                    class="form-control @error('perihal') is-invalid @enderror" value="{{ old('perihal') }}">
                @error('perihal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="id_kategori">Kategori</label>
                <select name="id_kategori" class="form-control @error('id_kategori') is-invalid @enderror" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($kategori as $item)
                        <option value="{{ $item->id_kategori }}">{{ $item->nama_kategori }}</option>
                    @endforeach
                </select>
                @error('id_kategori')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="penerima" class="form-label">Penerima</label>
                <input type="text" name="penerima" id="penerima"
                    class="form-control @error('penerima') is-invalid @enderror" value="{{ old('penerima') }}">
                @error('penerima')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="file" class="form-label">File PDF</label>
                <input type="file" name="file" id="file" accept="application/pdf"
                    class="form-control @error('file') is-invalid @enderror">
                @error('file')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('berita.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
