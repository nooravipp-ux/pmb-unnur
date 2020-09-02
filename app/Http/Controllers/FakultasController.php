<?php

namespace App\Http\Controllers;
use App\pmb_fakultas;
use App\pmb_prodi;

use Illuminate\Http\Request;

class FakultasController extends Controller
{
    public function fakultas(){
        $fakultas = pmb_fakultas::all();
        return view('data.fakultas',compact('fakultas'));
    }
    public function fakultas_store(Request $request){
        pmb_fakultas::create($request->all());
        return redirect()->back()->with('sukses','data berhasil di tamnbah');
    }
    public function fakultas_edit(Request $request,$id_fakultas){
        $id = request()->get(‘pk’);
        $key = request()->get(‘name’);
        $value = request()->get(‘value’);
        dd($id);
    }
    public function fakultas_destroy(Pmb_fakultas $pmb_fakultas){
        $pmb_fakultas->delete($pmb_fakultas);
        return redirect()->back()->with('sukses','data berhasil di hapus');
    }

    public function prodi(){
        $prodi = pmb_prodi::all();
        return view('data.prodi',compact('prodi'));
    }
}
