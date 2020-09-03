<?php

namespace App\Http\Controllers;
use App\fakultas;
use App\prodi;
use App\strata;
use App\kelas;
use DB;

use Illuminate\Http\Request;

class FakultasController extends Controller
{
    /**
     * function fakultas
     */
    public function fakultas(){
        $fakultas = fakultas::all();
        return view('data.master-fakultas.fakultas',compact('fakultas'));
    }
    public function fakultas_store(Request $request){
        $this->validate($request,[
            'id_fakultas' => 'required|unique:fakultas',
            'nama_fakultas' => 'required|string'
        ]);
        try{
            // dd($request->all());
            fakultas::create($request->all());
            return redirect()->back()->with('sukses','berhasil menambhakan data fakultas '.$request->nama_fakultas);
        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }

    public function fakultas_destroy(Fakultas $fakultas){
        $fakultas->delete($fakultas);
        return redirect()->back()->with('sukses','data berhasil di hapus');
    }
    /**
     * end function fakultas
     */


    /**
     * function prodi
     */
    public function prodi(){
        $fakultas = fakultas::get()->pluck('id_fakultas','nama_fakultas');
        $prodi = prodi::all();
        return view('data.master-prodi.prodi',compact('prodi','fakultas'));
    }

    public function prodi_store(Request $request){
        $this->validate($request,[
            'id_prodi' => 'required|unique:prodi',
            'id_fakultas' => 'required|string',
            'nama_prodi' => 'required|string'
        ]);
        try{
            prodi::create($request->all());
            return redirect()->back()->with('sukses','BErhasil menambahkan data prodi'.$request->nama_prodi);
        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }
    public function prodi_destroy(Prodi $prodi){
        $prodi->delete($prodi);
        return redirect()->back()->with('sukses','data berhasil di hapus');
    }
    /**
     * end function prodi
     */

    /**
     * function kelas
     */
    public function kelas(){
        $strata = strata::get()->pluck('id_strata','jenis_strata');
        $kelas = kelas::all();
        return view('data.master-kelas.kelas',compact('kelas','strata'));
    }

    public function kelas_store(Request $request){
        $this->validate($request,[
            'id_prodi' => 'required|unique:prodi',
            'id_fakultas' => 'required|string',
            'nama_prodi' => 'required|string'
        ]);
        try{
            kelas::create($request->all());
            return redirect()->back()->with('sukses','BErhasil menambahkan data prodi'.$request->nama_prodi);
        }catch(\Excetion $e){
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }
    public function kelas_destroy(Kelas $kelas){
        $kelas->delete($kelas);
        return redirect()->back()->with('sukses','data berhasil di hapus');
    }
    /**
     * end function prodi
     */

    /**
     * function jenjang
     */
    public function strata(){
        $prodi = prodi::get()->pluck('id_prodi');
        $strata = strata::all();
        return view('data.master-strata.strata',compact('strata','prodi'));
    }
    public function strata_store(Request $request){
        $this->validate($request,[
            'id_prodi' => 'required|string',
            'jenis_strata' => 'required|string'
        ]);
        try{
            strata::create($request->all());
            return redirect()->back()->with('sukses','Data Strata '.$request->jenis_strata.' berhasil di tambahkan');
        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }
    public function strata_destroy($id){
        $pmb_strata = strata::findOrfail($id);
        $pmb_strata->delete($id);
        return redirect()->back()->with('sukses','data berhasil di hapus');
    }
    /**
     * end function strata
     */
    public function get_data_fakultas(Request $request){
        if ($request->has('q')) {
            $cari = $request->q;
            $data_fakultas = DB::table('fakultas')->select('id_fakultas','nama_fakultas')->where('id_fakultas', 'LIKE', '%'.$cari.'%')->orWhere('nama_fakultas', 'LIKE', '%'.$cari.'%')->get();

            return response()->json($data_fakultas);
        }
        $data_fakultas= DB::table('fakultas')->select('id_fakultas','nama_fakultas')->get();

        return response()->json($data_fakultas);
    }
}
