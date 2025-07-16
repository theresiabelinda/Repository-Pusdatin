<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periode;

class PeriodeController extends Controller
{
    public function index(){
        $periode = Periode::all();
        return view('backend.content.periode.list', compact('periode'));
    }

    public function tambah(){
        return view('backend.content.periode.formTambah');
    }

    public function prosesTambah(Request $request){
        $this->validate($request, [
            'jenis_periode' => 'required'
        ]);

        $periode = new Periode();
        $periode->jenis_periode = $request->jenis_periode;

        try{
            $periode->save();
            return redirect(route('periode.index'))->with('pesan',['success','Berhasil tambah periode']);
        }catch(\Exception $e){
            return redirect(route('periode.index'))->with('pesan',['danger','Gagal tambah periode']);
        }
    }

    public function ubah($id){
        $periode = Periode::findOrFail($id);
        return view('backend.content.periode.formUbah', compact('periode'));
    }

    public function prosesUbah(Request $request){
        $this->validate($request, [
            'id_periode' => 'required',
            'jenis_periode' => 'required',
        ]);

        $periode = Periode::findOrFail($request->id_periode);
        $periode->jenis_periode = $request->jenis_periode;

        try{
            $periode->save();
            return redirect(route('periode.index'))->with('pesan',['success','Berhasil ubah periode']);
        }catch(\Exception $e){
            return redirect(route('periode.index'))->with('pesan',['danger','Gagal ubah periode']);
        }
    }

    public function hapus($id){
        $periode = Periode::findOrFail($id);

        try{
            $periode->delete();
            return redirect(route('periode.index'))->with('pesan',['success','Berhasil hapus periode']);
        }catch(\Exception $e){
            return redirect(route('periode.index'))->with('pesan',['danger','Gagal hapus periode']);
        }
    }
}
