@extends('backend.layout.main')

@section('content')
    <div class="container-fluid">
        <div class="row mt-4 align-items-center">
            <div class="col-lg-6">
                <h1 class="h3 mb-2 text-gray-800">Daftar User</h1>
            </div>
            <div class="col-lg-6 text-end"> {{-- gunakan text-end untuk Bootstrap 5, atau text-right untuk Bootstrap 4 --}}
                <a href="{{ route('user.tambah') }}" class="btn btn-primary px-4">
                    <i class="fa fa-plus"></i> Tambah
                </a>
            </div>
        </div>

        @if(session()->has('pesan'))
            <div class="alert alert-{{ session()->get('pesan')[0] }}">
                {{ session()->get('pesan')[1] }}
            </div>
        @endif

        <div class="card shadow mb-4 mt-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="card-header text-white" style="background-color: #003366;">
                            <tr>
                                <th>No</th>
                                <th>Nama User</th>
                                <th>Email User</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach($user as $row)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>
                                        <a href="{{ route('user.ubah', $row->id) }}" class="btn btn-sm btn-secondary">
                                            <i class="fa fa-edit"></i> Ubah
                                        </a>
                                        <a href="{{ route('user.hapus', $row->id) }}" onclick="return confirm('Anda yakin?')" class="btn btn-sm btn-secondary">
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
