@extends('backend.layout.main')

@section('content')
    <div class="container-fluid mt-4">
        <h1 class="h3 mb-2 text-gray-800">Tambah Daftar Dosen</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('dosen.prosesTambah') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="form-label">Nama Dosen</label>
                        <input type="text" name="nama" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror">
                        @error('nama')
                            <span style="color: red; font-weight: 600; font-size: 9pt">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="form-label">NIDN</label>
                        <input type="text" name="nidn" value="{{ old('nidn') }}" class="form-control @error('nidn') is-invalid @enderror">
                        @error('nidn')
                            <span style="color: red; font-weight: 600; font-size: 9pt">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Tombol biru tua --}}
                    <button type="submit" class="btn" style="background-color: #0d47a1; color: white;">Tambah</button>
                    <a href="{{ route('dosen.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection
