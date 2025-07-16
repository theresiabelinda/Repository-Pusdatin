@extends('backend.layout.main')

@section('content')
    <div class="container-fluid mt-4">
        <h1 class="h3 mb-2 text-gray-800">Tambah Periode Akademik</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('periode.prosesTambah') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="form-label">Periode Akademik</label>
                        <input type="text" name="jenis_periode" value="{{ old('jenis_periode') }}" class="form-control @error('jenis_periode') is-invalid @enderror">
                        @error('jenis_periode')
                            <span style="color: red; font-weight: 600; font-size: 9pt">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Tombol biru tua --}}
                    <button type="submit" class="btn" style="background-color: #0d47a1; color: white;">Tambah</button>
                    <a href="{{ route('periode.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection
