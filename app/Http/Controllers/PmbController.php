<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PmbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pendaftaran_pmb()
    {
        $data_pmb = DB::table('pmb')->get();
        // dd($data_pmb);
        return view('setting_pmb.pendaftaran_pmb', compact('data_pmb'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function biaya_registrasi()
    {
        $data_biaya_registrasi = DB::table('pmb_biaya_registrasi')
                                ->join('fakultas','fakultas.id_fakultas','=','pmb_biaya_registrasi.id_fakultas')
                                ->get();
        return view('setting_pmb.biaya_registrasi', compact('data_biaya_registrasi'));
    }

    public function simpan_biaya_registrasi(Request $request)
    {
        DB::table('pmb_biaya_registrasi')->insert([
            ['id_pmb' => $request->id_pmb,'id_fakultas' => $request->id_fakultas, 'strata' => $request->jenjang_prodi, 'kelas' => $request->kelas,'biaya_registrasi' => $request->biaya_registrasi]
        ]);

        return redirect('/pengaturan/pendaftaran-pmb/biaya-registrasi')->with('sukses','data berhasil di simpan');
    }

    public function simpan_data_pmb(Request $request)
    {   
        $id_pmb = $this->nomor_pmb($request->tahun_masuk, $request->gelombang);
        // dd($id_pmb);
        DB::table('pmb')->insert([
            ['id_pmb' => $id_pmb,'tahun' => $request->tahun_masuk, 'gelombang' => $request->gelombang, 'start_date' => $request->start_date,'finish_date' => $request->finish_date]
        ]);

        return redirect('pengaturan/pendaftaran-pmb')->with('sukses','data berhasil di simpan');
        
    }

    public function destroy($id)
    {
        DB::table('pmb')->where('id_pmb', '=', $id)->delete();
        return redirect('pengaturan/pendaftaran-pmb')->with('sukses','data berhasil di hapus');
    }

    public function delete_biaya_registrasi($id)
    {
        DB::table('pmb_biaya_registrasi')->where('id_pmb_biaya_registrasi', '=', $id)->delete();
        return redirect('/pengaturan/pendaftaran-pmb/biaya-registrasi')->with('sukses','data berhasil di hapus');
    }

    public function nomor_pmb($tahun, $gelombang){
        $no = 1;
        $no_urut = "";
        $no_urut = DB::select("SELECT '$tahun' AS tahun_masuk, '$gelombang' AS gelombang, LPAD((RIGHT(COUNT(ID_PMB),4)+1),4,'0') AS no_urut_pmb FROM pmb WHERE LEFT(ID_PMB,2)= '$tahun'");
        foreach($no_urut as $pmb){
            if($pmb->no_urut_pmb != NULL){
                return $no_urut = $pmb->tahun_masuk.$pmb->gelombang.$pmb->no_urut_pmb;
            }else{
                return $no_urut = $tahun.$gelombang.sprintf("%04s", $no);
            }
        } 
    }
    public function get_data_pmb(Request $request){
        if ($request->has('q')) {
            $cari = $request->q;
            $data_pmb = DB::table('pmb')->select('id_pmb')->where('id_pmb', 'LIKE', '%'.$cari.'%')->get();

            return response()->json($data_pmb);
        }
        $data_pmb = DB::table('pmb')->select('id_pmb')->get();

        return response()->json($data_pmb);
    }
}
