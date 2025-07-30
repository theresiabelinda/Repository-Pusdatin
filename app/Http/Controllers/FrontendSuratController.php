<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use App\Models\Kategori;
use App\Models\User;
use App\Models\Dosen;
use App\Models\Berita;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FrontendSuratController extends Controller{
public function form()
{
    return view('frontend.tambah-sk', [
        'periode' => Periode::all(),
        'kategori' => Kategori::all(),
        'dosen' => Dosen::all(),
    ]);
}

public function proses(Request $request)
{
    $request->validate([
        'no_surat' => 'required|string|max:255',
        'id_periode' => 'required',
        'tanggal_surat' => 'required|date',
        'perihal' => 'required|string|max:255',
        'id_kategori' => 'required',
        'penerima' => 'required',
        'file' => 'required|mimes:pdf|max:2048',
    ]);

    $file = $request->file('file');
    $fileName = 'sk_' . time() . '_' . Str::slug($request->no_surat) . '.' . $file->getClientOriginalExtension();
    $file->storeAs('public/jurnal', $fileName);

    Berita::create([
        'no_surat' => $request->no_surat,
        'id_periode' => $request->id_periode,
        'tanggal_surat' => $request->tanggal_surat,
        'perihal' => $request->perihal,
        'id_kategori' => $request->id_kategori,
        'penerima' => $request->penerima,
        'file' => $fileName,
    ]);

    return redirect()->route('frontend.sk.form')->with('pesan', ['success', 'Surat berhasil dikirim!']);
}
}
