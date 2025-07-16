<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Kategori;
use App\Models\Periode;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redis;

class BeritaController extends Controller
{
    public function index(){
        $berita = Berita::with('kategori')->get();
        return view('backend.content.berita.list', compact('berita'));
    }

    public function tambah(){
        $kategori = Kategori::all();
        $periode = Periode::all();
        return view('backend.content.berita.formTambah', compact('kategori','periode'));
    }

    public function prosesTambah(Request $request){
        $this->validate($request, [
            'no_surat' => 'required',
            'tanggal_surat' => 'required|date',
            'perihal' => 'required',
            'id_kategori' => 'required',
            'id_periode' => 'required',
            'penerima' => 'required',
            'file' => 'required|mimes:pdf|max:2048'
        ]);

        $berita = new Berita();
        $berita->no_surat = $request->no_surat;
        $berita->tanggal_surat = $request->tanggal_surat;
        $berita->id_kategori = $request->id_kategori;
        $berita->id_periode = $request->id_periode;
        $berita->perihal = $request->perihal;
        $berita->penerima = $request->penerima;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/jurnal', $namaFile);
            $berita->file = $namaFile;
        }

        try {
            $berita->save();
            return redirect(route('berita.index'))->with('pesan', ['success', 'Berhasil tambah data surat']);
        } catch (Exception $e) {
            return redirect(route('berita.index'))->with('pesan', ['danger', 'Gagal tambah data surat']);
        }
    }

    public function ubah($id){
        $berita = Berita::findOrFail($id);
        $kategori = Kategori::all();
        $periode = Periode::all();
        return view('backend.content.berita.formUbah', compact('berita', 'kategori', 'periode'));
    }

    public function prosesUbah(Request $request){
        $this->validate($request, [
            'id_berita' => 'required',
            'no_surat' => 'required',
            'tanggal_surat' => 'required|date',
            'perihal' => 'required',
            'id_kategori' => 'required',
            'id_periode' => 'required',
            'penerima' => 'required',
            'file' => 'nullable|mimes:pdf|max:2048'
        ]);

        $berita = Berita::findOrFail($request->id_berita);
        $berita->no_surat = $request->no_surat;
        $berita->tanggal_surat = $request->tanggal_surat;
        $berita->id_kategori = $request->id_kategori;
        $berita->perihal = $request->perihal;
        $berita->penerima = $request->penerima;

        if ($request->hasFile('file')) {
            if ($berita->file && Storage::exists('public/jurnal/' . $berita->file)) {
                Storage::delete('public/jurnal/' . $berita->file);
            }

            $file = $request->file('file');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/jurnal', $namaFile);
            $berita->file = $namaFile;
        }

        try {
            $berita->save();
            return redirect(route('berita.index'))->with('pesan', ['success', 'Berhasil ubah data surat']);
        } catch (Exception $e) {
            return redirect(route('berita.index'))->with('pesan', ['danger', 'Gagal ubah data surat']);
        }
    }

    public function hapus($id){
        $berita = Berita::findOrFail($id);

        try {
            if ($berita->file && Storage::exists('public/jurnal/' . $berita->file)) {
                Storage::delete('public/jurnal/' . $berita->file);
            }
            $berita->delete();
            return redirect(route('berita.index'))->with('pesan', ['success', 'Berhasil hapus data surat']);
        } catch (Exception $e) {
            return redirect(route('berita.index'))->with('pesan', ['danger', 'Gagal hapus data surat']);
        }
    }
}
