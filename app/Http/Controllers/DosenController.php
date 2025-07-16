<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;

class DosenController extends Controller
{
    public function index(){
        $dosen = Dosen::all();
        return view('backend.content.dosen.list', compact('dosen'));
    }

    public function tambah(){
        return view('backend.content.dosen.formTambah');
    }

    public function prosesTambah(Request $request){
        $this->validate($request, [
            'nama' => 'required',
            'nidn' => 'required',
        ]);

        $dosen = new Dosen();
        $dosen->nama = $request->nama;
        $dosen->nidn = $request->nidn;

        try{
            $dosen->save();
            return redirect(route('dosen.index'))->with('pesan',['success','Berhasil tambah dosen']);
        }catch(\Exception $e){
            return redirect(route('dosen.index'))->with('pesan',['danger','Gagal tambah dosen']);
        }
    }

    public function ubah($id){
        $dosen = Dosen::findOrFail($id);
        return view('backend.content.dosen.formUbah', compact('dosen'));
    }

    public function prosesUbah(Request $request){
        $this->validate($request, [
            'id' => 'required',
            'nama' => 'required',
            'nidn' => 'required',
        ]);

        $dosen = Dosen::findOrFail($request->id);
        $dosen->nama = $request->nama;
        $dosen->nidn = $request->nidn;

        try{
            $dosen->save();
            return redirect(route('dosen.index'))->with('pesan',['success','Berhasil ubah dosen']);
        }catch(\Exception $e){
            return redirect(route('dosen.index'))->with('pesan',['danger','Gagal ubah dosen']);
        }
    }

    public function hapus($id){
        $dosen = Dosen::findOrFail($id);

        try{
            $dosen->delete();
            return redirect(route('dosen.index'))->with('pesan',['success','Berhasil hapus dosen']);
        }catch(\Exception $e){
            return redirect(route('dosen.index'))->with('pesan',['danger','Gagal hapus dosen']);
        }
    }
}
