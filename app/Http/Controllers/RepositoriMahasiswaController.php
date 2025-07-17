<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RepositoriMahasiswa;
use App\Models\Kategori;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redis;

class RepositoriMahasiswaController extends Controller
{
        public function index(Request $request){
            $query = RepositoriMahasiswa::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('judul', 'like', '%' . $request->search . '%')
                ->orWhere('penulis', 'like', '%' . $request->search . '%');
        }

        $repositorimahasiswa = $query->with('kategori')->get();

        return view('backend.content.repositorimahasiswa.list', compact('repositorimahasiswa'));
    }

        public function tambah(){
            $kategori = Kategori::all();
            return view('backend.content.repositorimahasiswa.formTambah', compact('kategori'));
        }

        public function prosesTambah(Request $request){
        $this->validate($request, [
            'judul' => 'required',
            'abstrak' => 'required',
            'penulis' => 'required',
            'tahun' => 'required',
            'id_kategori' => 'required',
            'file_cover' => 'required|mimes:pdf|max:2048',
            'file_pengesahan' => 'required|mimes:pdf|max:2048',
            'file_abstrakdandaftarisi' => 'required|mimes:pdf|max:2048',
            'file_bab1' => 'required|mimes:pdf|max:2048',
            'file_bab2' => 'required|mimes:pdf|max:2048',
            'file_bab3' => 'required|mimes:pdf|max:2048',
            'file_bab4' => 'required|mimes:pdf|max:2048',
            'file_bab5' => 'required|mimes:pdf|max:2048',
            'file_lampiran' => 'required|mimes:pdf|max:2048'
        ]);

        $repositorimahasiswa = new RepositoriMahasiswa();
        $repositorimahasiswa->judul = $request->judul;
        $repositorimahasiswa->abstrak = $request->abstrak;
        $repositorimahasiswa->penulis = $request->penulis;
        $repositorimahasiswa->tahun = $request->tahun;
        $repositorimahasiswa->id_kategori = $request->id_kategori;

        // Slug folder dari judul
        $judulFolder = Str::slug($request->penulis. '_' . $request->tahun, '_');

        // Simpan tiap file ke folder
        $fileFields = [
            'file_cover', 'file_pengesahan','file_abstrakdandaftarisi', 'file_bab1', 
            'file_bab2', 'file_bab3', 'file_bab4', 'file_bab5', 'file_lampiran'
        ];

        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $uploadedFile = $request->file($field);
                $filename = time() . '_' . $uploadedFile->getClientOriginalName();
                $uploadedFile->storeAs("public/repositori/{$judulFolder}", $filename);
                $repositorimahasiswa->$field = "{$judulFolder}/{$filename}";
            }
        }

        try {
            $repositorimahasiswa->save();
            return redirect(route('repositorimahasiswa.index'))->with('pesan', ['success', 'Berhasil tambah data repository']);
        } catch (Exception $e) {
            return redirect(route('repositorimahasiswa.index'))->with('pesan', ['danger', 'Gagal tambah data repository']);
        }
    }

    public function ubah($id){
        $repositorimahasiswa = RepositoriMahasiswa::findOrFail($id);
        $kategori = Kategori::all();
        return view('backend.content.repositorimahasiswa.formUbah', compact('repositorimahasiswa', 'kategori'));
    }

    public function prosesUbah(Request $request){
        $this->validate($request, [
            'id' => 'required',
            'judul' => 'required',
            'abstrak' => 'required',
            'penulis' => 'required',
            'tahun' => 'required',
            'id_kategori' => 'required',
            'file_cover' => 'nullable|mimes:pdf|max:2048',
            'file_pengesahan' => 'nullable|mimes:pdf|max:2048',
            'file_abstrakdandaftarisi' => 'nullable|mimes:pdf|max:2048',
            'file_bab1' => 'nullable|mimes:pdf|max:2048',
            'file_bab2' => 'nullable|mimes:pdf|max:2048',
            'file_bab3' => 'nullable|mimes:pdf|max:2048',
            'file_bab4' => 'nullable|mimes:pdf|max:2048',
            'file_bab5' => 'nullable|mimes:pdf|max:2048',
            'file_lampiran' => 'nullable|mimes:pdf|max:2048'
        ]);

        $repositorimahasiswa = RepositoriMahasiswa::findOrFail($request->id);;
        $repositorimahasiswa->judul = $request->judul;
        $repositorimahasiswa->abstrak = $request->abstrak;
        $repositorimahasiswa->penulis = $request->penulis;
        $repositorimahasiswa->tahun = $request->tahun;
        $repositorimahasiswa->id_kategori = $request->id_kategori;

        // Slug folder dari judul
        $judulFolder = Str::slug($request->penulis. '_' . $request->tahun, '_');

        // Simpan tiap file ke folder
        $fileFields = [
            'file_cover', 'file_pengesahan','file_abstrakdandaftarisi', 'file_bab1', 
            'file_bab2', 'file_bab3', 'file_bab4', 'file_bab5', 'file_lampiran'
        ];

        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $uploadedFile = $request->file($field);
                $filename = time() . '_' . $uploadedFile->getClientOriginalName();
                $uploadedFile->storeAs("public/repositori/{$judulFolder}", $filename);
                $repositorimahasiswa->$field = "{$judulFolder}/{$filename}";
            }
        }

        try {
            $repositorimahasiswa->save();
            return redirect(route('repositorimahasiswa.index'))->with('pesan', ['success', 'Berhasil tambah data repository']);
        } catch (Exception $e) {
            return redirect(route('repositorimahasiswa.index'))->with('pesan', ['danger', 'Gagal tambah data repository']);
        }
    }

    public function hapus($id){
        $repositorimahasiswa = RepositoriMahasiswa::findOrFail($id);

        try {
            if ($repositorimahasiswa->file && Storage::exists('public/repositori/' . $repositorimahasiswa->file)) {
                Storage::delete('public/repositori/' . $repositorimahasiswa->file);
            }
            $repositorimahasiswa->delete();
            return redirect(route('repositorimahasiswa.index'))->with('pesan', ['success', 'Berhasil hapus data repository']);
        } catch (Exception $e) {
            return redirect(route('repositorimahasiswa.index'))->with('pesan', ['danger', 'Gagal hapus data repository']);
        }
    }
}
