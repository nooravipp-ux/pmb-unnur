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
        $prodi = prodi::all();
        return view('data.master-prodi.prodi',compact('prodi'));
    }

    public function prodi_store(Request $request){
        dd($request->all());
        $this->validate($request,[
            'id_prodi' => 'required|unique:prodi',
            'id_fakultas' => 'required|string',
            'nama_prodi' => 'required|string'
        ]);
        try{
            prodi::create($request->all());
            return redirect()->back()->with('sukses','Berhasil menambahkan data prodi '.$request->nama_prodi);
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
        $kelas = kelas::all();
        return view('data.master-kelas.kelas',compact('kelas'));
    }

    public function kelas_store(Request $request){
        // $this->validate($request,[
        //     'id_kelas' => 'required|unique:kelas',
        //     'id_strata' => 'required|string',
        //     'nama_kelas' => 'required|string'
        // ]);
        try{
            kelas::create($request->all());
            return redirect()->back()->with('sukses','Berhasil menambahkan data prodi '.$request->id_kelas.' '.$request->nama_kelas);
        }catch(\Exceton $e){
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }
    public function kelas_destroy(Kelas $kelas){
        $kelas->delete($kelas);
        return redirect()->back()->with('sukses','data berhasil di hapus');
    }
    /**
     * end function kelas
     */

    /**
     * function jenjang
     */
    public function strata(){
        $strata = strata::all();
        return view('data.master-strata.strata',compact('strata'));
    }
    public function strata_store(Request $request){
        $this->validate($request,[
            'id_prodi' => 'required|string',
            'jenis_strata' => 'required|string',
            'id_strata' => 'required|unique:strata'
        ]);
        try{
            strata::create($request->all());
            return redirect()->back()->with('sukses','Data Jenjang Pendidikan '.$request->jenis_strata.' berhasil di tambahkan');
        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>$e->getMessage()]);
        }
    }
    public function strata_destroy(Strata $strata){
        $strata->delete($strata);
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
    public function get_data_prodi(Request $request){
        if ($request->has('q')) {
            $cari = $request->q;
            $data_prodi = DB::table('prodi')->select('id_prodi','nama_prodi')->where('id_prodi', 'LIKE', '%'.$cari.'%')->orWhere('nama_prodi', 'LIKE', '%'.$cari.'%')->get();

            return response()->json($data_prodi);
        }
        $data_prodi= DB::table('prodi')->select('id_prodi','nama_prodi')->get();

        return response()->json($data_prodi);
    }
    public function get_data_jenjang_prodi(Request $request){
        if ($request->has('q')) {
            $cari = $request->q;
            $data_jenjang_prodi = DB::table('strata')->select('id_strata','id_prodi','jenis_strata')->where('id_strata', 'LIKE', '%'.$cari.'%')->orWhere('jenis_strata', 'LIKE', '%'.$cari.'%')->get();

            return response()->json($data_jenjang_prodi);
        }
        $data_jenjang_prodi= DB::table('strata')->select('id_strata','id_prodi','jenis_strata')->get();

        return response()->json($data_jenjang_prodi);
    }
    public function get_data_kelas(Request $request){
        if ($request->has('q')) {
            $cari = $request->q;
            $data_kelas = DB::table('kelas')->select('id_kelas','nama_kelas')->where('id_kelas', 'LIKE', '%'.$cari.'%')->orWhere('nama_kelas', 'LIKE', '%'.$cari.'%')->get();

            return response()->json($data_kelas);
        }
        $data_kelas= DB::table('kelas')->select('id_kelas','nama_kelas')->get();

        return response()->json($data_kelas);
    }
}
