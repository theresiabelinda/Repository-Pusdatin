@extends('backend.layout.main')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Selamat Datang Admin!</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>

        <div class="row">
            <!-- Tambahkan statistik atau grafik di sini jika dibutuhkan -->
        </div>

        <div class="card mb-4">
            <div class="card-header text-white" style="background-color: #003366;">
            <i class="fas fa-file-alt me-1"></i>
            Daftar Surat Keputusan Terbaru
            </div>

            <div class="card-body">
                <table id="datatablesSimple" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Surat</th>
                            <th>Periode Akademik</th>
                            <th>Tanggal Surat</th>
                            <th>Perihal</th>
                            <th>Penerima</th>
                            <th>Kategori</th>
                            <th>File</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($berita as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->no_surat }}</td>
                                <td>{{ $item->periode->jenis_periode ?? '-' }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal_surat)->format('d-m-Y') }}</td>
                                <td>{{ $item->perihal }}</td>
                                <td>{{ $item->penerima }}</td>
                                <td>{{ $item->kategori->nama_kategori ?? '-' }}</td>
                                <td>
                                    @if ($item->file)
                                        <a href="{{ asset('storage/jurnal/' . $item->file) }}" target="_blank">Lihat File</a>
                                    @else
                                        Tidak ada file
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                        @if($berita->isEmpty())
                            <tr>
                                <td colspan="7" class="text-center">Belum ada data surat keputusan.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</main>
@endsection
