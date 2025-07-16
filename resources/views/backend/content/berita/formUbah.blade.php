@extends('backend.layout.main')

@section('content')
<div class="container mt-4">
    <h2>Ubah Surat Keputusan</h2>

    {{-- Notifikasi jika ada pesan --}}
    @if(session('pesan'))
        <div class="alert alert-{{ session('pesan')[0] }}">
            {{ session('pesan')[1] }}
        </div>
    @endif

    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('berita.prosesUbah') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id_berita" value="{{ $berita->id_berita }}">

        <div class="mb-3">
            <label for="no_surat" class="form-label">Nomor Surat</label>
            <input type="text" name="no_surat" id="no_surat" class="form-control @error('no_surat') is-invalid @enderror" value="{{ old('no_surat', $berita->no_surat) }}">
            @error('no_surat')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tanggal_surat" class="form-label">Tanggal Surat</label>
            <input type="date" name="tanggal_surat" id="tanggal_surat" class="form-control @error('tanggal_surat') is-invalid @enderror" value="{{ old('tanggal_surat', $berita->tanggal_surat) }}">
            @error('tanggal_surat')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="perihal" class="form-label">Perihal</label>
            <textarea name="perihal" id="perihal" rows="4" class="form-control @error('perihal') is-invalid @enderror">{{ old('perihal', $berita->perihal) }}</textarea>
            @error('perihal')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="penerima" class="form-label">Penerima</label>
            <input type="text" name="penerima" id="penerima" class="form-control @error('penerima') is-invalid @enderror" value="{{ old('penerima', $berita->penerima) }}">
            @error('penerima')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="id_kategori" class="form-label">Kategori</label>
            <select name="id_kategori" id="id_kategori" class="form-control @error('id_kategori') is-invalid @enderror" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach ($kategori as $item)
                    <option value="{{ $item->id_kategori }}" {{ $berita->id_kategori == $item->id_kategori ? 'selected' : '' }}>
                        {{ $item->nama_kategori }}
                    </option>
                @endforeach
            </select>
            @error('id_kategori')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="id_periode" class="form-label">Periode</label>
            <select name="id_periode" id="id_periode" class="form-control @error('id_periode') is-invalid @enderror" required>
                <option value="">-- Pilih Periode --</option>
                @foreach ($periode as $item)
                    <option value="{{ $item->id_periode }}" {{ $berita->id_periode == $item->id_periode ? 'selected' : '' }}>
                        {{ $item->jenis_periode }}
                    </option>
                @endforeach
            </select>
            @error('id_periode')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="file" class="form-label">File PDF (opsional)</label>
            <input type="file" name="file" id="file" accept="application/pdf" class="form-control @error('file') is-invalid @enderror">
            @error('file')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            @if($berita->file)
                <p class="mt-2">File saat ini: 
                    <a href="{{ asset('storage/jurnal/' . $berita->file) }}" target="_blank">{{ $berita->file }}</a>
                </p>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('berita.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
