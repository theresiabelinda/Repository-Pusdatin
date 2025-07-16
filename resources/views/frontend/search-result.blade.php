@extends('frontend.layout.main')

@section('content')
<div class="container mt-4">
    <h4>Hasil Pencarian: "{{ $query }}"</h4>

    @if ($results->isEmpty())
        <p>Tidak ada hasil ditemukan.</p>
    @else
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>No Surat</th>
                    <th>Perihal</th>
                    <th>Penerima</th>
                    <th>Kategori</th>
                    <th>Periode</th>
                    <th>File PDF</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($results as $berita)
                    <tr>
                        <td>{{ $berita->no_surat }}</td>
                        <td>{{ $berita->perihal }}</td>
                        <td>{{ $berita->penerima }}</td>
                        <td>{{ $berita->kategori->nama_kategori ?? '-' }}</td>
                        <td>{{ $berita->periode->jenis_periode ?? '-' }}</td>
                        <td>
                            @if($berita->file)
                                <a href="{{ asset('storage/jurnal/' . $berita->file) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-download"></i> Download
                                </a>
                            @else
                                <span class="text-muted">Tidak ada file</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
