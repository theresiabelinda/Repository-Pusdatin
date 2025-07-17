@extends('backend.layout.main')

@section('content')
    <div class="container-fluid">
        <div class="row mt-4 align-items-center">
            <div class="col-lg-6">
                <h1 class="h3 mb-2 text-gray-800">Daftar Repository Mahasiswa</h1>
            </div>
            <div class="col-lg-6 text-end">
                <a href="{{ route('repositorimahasiswa.tambah') }}" class="btn btn-primary px-4">
                    <i class="fa fa-plus"></i> Tambah Data Repository
                </a>
            </div>
        </div>

        @if(session()->has('pesan'))
            <div class="alert alert-{{ session()->get('pesan')[0] }}">
                {{ session()->get('pesan')[1] }}
            </div>
        @endif

        <form action="{{ route('repositorimahasiswa.index') }}" method="GET" class="row g-3 align-items-center mb-3">
            <div class="col-auto">
            <input type="text" name="search" class="form-control" placeholder="Cari judul / penulis..." value="{{ request('search') }}">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-dark">
                <i class="fa fa-search"></i> Cari
            </button>
                <a href="{{ route('repositorimahasiswa.index') }}" class="btn btn-outline-secondary">
                    <i class="fa fa-refresh"></i> Reset
                </a>
        </div>
        </form>


        <div class="card shadow mb-4 mt-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="card-header text-white" style="background-color: #003366;">
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Abstrak</th>
                                <th>Kategori</th>
                                <th>Tahun</th>
                                <th>File</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach($repositorimahasiswa as $row)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $row->judul }}</td>
                                    <td>{{ $row->penulis }}</td>
                                    <td>{{ $row->abstrak }}</td>
                                    <td>{{ $row->kategori->nama_kategori ?? '-' }}</td>
                                    <td>{{ $row->tahun }}</td>
                                    <td>
                                    <div class="d-grid gap-1">
                                        @php
                                            $fileParts = [
                                                'file_cover' => 'Cover',
                                                'file_pengesahan' => 'Pengesahan',
                                                'file_abstrakdandaftarisi' => 'Abstrak & Daftar Isi',
                                                'file_bab1' => 'Bab I',
                                                'file_bab2' => 'Bab II',
                                                'file_bab3' => 'Bab III',
                                                'file_bab4' => 'Bab IV',
                                                'file_bab5' => 'Bab V',
                                                'file_lampiran' => 'Lampiran',
                                            ];
                                        @endphp

                                        @foreach ($fileParts as $field => $label)
                                        @if ($row->$field)
                                            <a href="{{ asset('storage/repositori/' . $row->$field) }}" target="_blank" class="btn btn-sm btn-info">
                                                <i class="fa fa-file-pdf-o"></i> {{ $label }}
                                            </a>
                                        @endif
                                        @endforeach
                                    </div>
                                    </td>

                                    <td>
                                        <a href="{{ route('repositorimahasiswa.ubah', $row->id) }}" class="btn btn-sm btn-secondary">
                                            <i class="fa fa-edit"></i> Ubah
                                        </a>
                                        <a href="{{ route('repositorimahasiswa.hapus', $row->id) }}" onclick="return confirm('Anda yakin?')" class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
