@extends('backend.layout.main')

@section('content')
    <div class="container mt-4">
        <h2 class="text-center text-primary mb-4">Tambah Data Repository Mahasiswa</h2>

        @if (session('pesan'))
            <div class="alert alert-{{ session('pesan')[0] }}">
                {{ session('pesan')[1] }}
            </div>
        @endif

        <form action="{{ route('repositorimahasiswa.prosesTambah') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" name="judul" id="judul"
                    class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}">
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="penulis" class="form-label">Penulis</label>
                <input type="text" name="penulis" id="penulis"
                    class="form-control @error('penulis') is-invalid @enderror" value="{{ old('penulis') }}">
                @error('penulis')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tahun" class="form-label">Tahun</label>
                <input type="number" name="tahun" id="tahun"
                    class="form-control @error('tahun') is-invalid @enderror" value="{{ old('tahun') }}">
                @error('tahun')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="abstrak" class="form-label">Abstrak</label>
                <textarea name="abstrak" id="abstrak" rows="4"
                    class="form-control @error('abstrak') is-invalid @enderror">{{ old('abstrak') }}</textarea>
                @error('abstrak')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="id_kategori" class="form-label">Kategori</label>
                <select name="id_kategori" id="id_kategori"
                    class="form-control @error('id_kategori') is-invalid @enderror">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($kategori as $item)
                        <option value="{{ $item->id_kategori }}" {{ old('id_kategori') == $item->id_kategori ? 'selected' : '' }}>
                            {{ $item->nama_kategori }}
                        </option>
                    @endforeach
                </select>
                @error('id_kategori')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <hr>
            <h5 class="mb-3">Unggah Data Repository (PDF)</h5>

            @foreach (['cover' => 'Cover', 'pengesahan' => 'Pengesahan', 'abstrakdandaftarisi' => 'Abstrak & Daftar Isi', 'bab1' => 'Bab I', 'bab2' => 'Bab II', 'bab3' => 'Bab III', 'bab4' => 'Bab IV', 'bab5' => 'Bab V', 'lampiran' => 'Lampiran'] as $field => $label)
                <div class="mb-3">
                    <label for="file_{{ $field }}" class="form-label">File {{ $label }}</label>
                    <input type="file" name="file_{{ $field }}" id="file_{{ $field }}" accept="application/pdf"
                        class="form-control @error('file_'.$field) is-invalid @enderror">
                    @error('file_'.$field)
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            @endforeach

            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('repositorimahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
