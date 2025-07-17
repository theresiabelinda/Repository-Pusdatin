@extends('backend.layout.main')

@section('content')
<div class="container mt-4">
    <h2>Ubah Repository Mahasiswa</h2>

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

    <form action="{{ route('repositorimahasiswa.prosesUbah') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $repositorimahasiswa->id }}">

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $repositorimahasiswa->judul) }}">
            @error('judul')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="penulis" class="form-label">Penulis</label>
            <input type="text" name="penulis" id="penulis" class="form-control @error('penulis') is-invalid @enderror" value="{{ old('penulis', $repositorimahasiswa->penulis) }}">
            @error('penulis')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tahun" class="form-label">Tahun</label>
            <input type="number" name="tahun" id="tahun" class="form-control @error('tahun') is-invalid @enderror" value="{{ old('tahun', $repositorimahasiswa->tahun) }}">
            @error('tahun')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="abstrak" class="form-label">Abstrak</label>
            <textarea name="abstrak" id="abstrak" rows="4" class="form-control @error('abstrak') is-invalid @enderror">{{ old('abstrak', $repositorimahasiswa->abstrak) }}</textarea>
            @error('abstrak')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="id_kategori" class="form-label">Kategori</label>
            <select name="id_kategori" id="id_kategori" class="form-control @error('id_kategori') is-invalid @enderror" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach ($kategori as $item)
                    <option value="{{ $item->id_kategori }}" {{ old('id_kategori', $repositorimahasiswa->id_kategori) == $item->id_kategori ? 'selected' : '' }}>
                        {{ $item->nama_kategori }}
                    </option>
                @endforeach
            </select>
            @error('id_kategori')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Upload File per Bab --}}
        @foreach ([
            'cover' => 'Cover', 'pengesahan' => 'Pengesahan', 'abstrakdandaftarisi' => 'Abstrak & Daftar Isi', 
            'bab1' => 'Bab I', 'bab2' => 'Bab II', 'bab3' => 'Bab III',
            'bab4' => 'Bab IV', 'bab5' => 'Bab V', 'lampiran' => 'Lampiran'
        ] as $key => $label)
            @php $currentFile = 'file_'.$key; @endphp
            <div class="mb-3">
                <label for="{{ $currentFile }}" class="form-label">File {{ $label }} (PDF)</label>
                <input type="file" name="{{ $currentFile }}" id="{{ $currentFile }}" class="form-control @error($currentFile) is-invalid @enderror" accept="application/pdf">
                @error($currentFile)
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                @if ($repositorimahasiswa->$currentFile)
                    <p class="mt-2">
                        File saat ini:
                        <a href="{{ asset('storage/' . $repositorimahasiswa->$currentFile) }}" target="_blank">{{ basename($repositorimahasiswa->$currentFile) }}</a>
                    </p>
                @endif
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('repositorimahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
