<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Berita;
use App\Models\Dosen;

class SearchController extends Controller
{
    // Fungsi verifikasi NIDN sebelum bisa akses pencarian
    public function validasiNidn(Request $request)
{
    $request->validate([
        'nidn' => 'required|numeric'
    ]);

    $nidn = trim($request->nidn);

    $dosen = Dosen::where('nidn', $nidn)->first();

    if ($dosen) {
        Session::put('izin_search', true);
        Session::put('nama_dosen', $dosen->nama);
        return redirect()->back()->with('success', 'Akses pencarian diizinkan untuk: ' . $dosen->nama);
    }

    return redirect()->back()->with('error', 'NIDN tidak ditemukan atau tidak diizinkan.');
}

    public function search(Request $request)
    {
        // Cek apakah sudah verifikasi NIDN
        if (!Session::has('izin_search')) {
            return redirect()->back()->with('error', 'Silakan masukkan NIDN terlebih dahulu.');
        }

        $query = $request->input('q');

        $results = Berita::with(['kategori', 'periode'])
            ->where('no_surat', 'like', "%$query%")
            ->orWhere('perihal', 'like', "%$query%")
            ->orWhere('penerima', 'like', "%$query%")
            ->orWhereHas('kategori', function ($q) use ($query) {
                $q->where('nama_kategori', 'like', "%$query%");
            })
            ->orWhereHas('periode', function ($q) use ($query) {
                $q->where('jenis_periode', 'like', "%$query%");
            })
            ->get();

        return view('frontend.search-result', compact('results', 'query'));
    }
}
