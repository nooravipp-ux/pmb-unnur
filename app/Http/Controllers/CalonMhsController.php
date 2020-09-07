<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CalonMhsController extends Controller
{
    public function formulir(){
        return view('calon_mahasiswa.formulir');
    }

    public function form_biodata(){
        return view('calon_mahasiswa.form_biodata');
    }
    public function form_upload(){
        return view('calon_mahasiswa.form_upload');
    }

    public function get_data_calonmhs(Request $request){
        // $list_data = DB::select("SELECT * FROM pmb_pendaftar  INNER JOIN pmb ON pmb_pendaftar.`id_pmb` = pmb.`id_pmb`
        // INNER JOIN pmb_biaya_registrasi ON pmb.`id_pmb` = pmb_biaya_registrasi.`id_pmb`
        // INNER JOIN fakultas ON pmb_biaya_registrasi.`id_fakultas` = fakultas.`id_fakultas`
        // INNER JOIN prodi ON fakultas.`id_fakultas` = prodi.`id_fakultas`
        // INNER JOIN strata ON prodi.`id_prodi` = strata.`id_prodi`
        // INNER JOIN kelas ON strata.`id_strata` = kelas.`id_strata`
        // WHERE pmb_pendaftar.`id_pendaftar`='" + $request->id_pendaftar + "'");

        $list_calonmhs = DB::table('pmb_pendaftar')
        ->join('pmb', 'pmb_pendaftar.id_pmb','=','pmb.id_pmb')
        ->join('pmb_biaya_registrasi', 'pmb.id_pmb','=','pmb_biaya_registrasi.id_pmb')
        ->join('fakultas', 'pmb_biaya_registrasi.id_fakultas','=','fakultas.id_fakultas')
        ->join('prodi', 'fakultas.id_fakultas','=','prodi.id_fakultas')
        ->join('strata', 'prodi.id_prodi','=','strata.id_prodi')
        ->join('kelas', 'strata.id_strata','=','kelas.id_strata')
        ->join('users','pmb_pendaftar.email','=','users.email')
        ->where('users.email', $request->email)
        ->first();

        //$list_calonmhs = head($list_data);

        return response()->json($list_calonmhs);
    }

    public function update_bukti_pembayaran(Request $request){
        $this->validate($request, [
            'file' => 'required|file|image|mimes:jpeg,png,jpg|max:3048'
        ]);
        
            $path = $request->file('file')->getRealPath();
            $bukti = file_get_contents($path);
            $base64 = base64_encode($bukti);

            DB::table('pmb_pendaftar')->where('id_pendaftar',$request->id_pendaftar)
                ->update([
                'bukti_pem' => $base64,
                ]);

                //return response('success');
            return redirect('/calon-mahasiswa/form-upload')->with('sukses','data berhasil di simpan');    
    }
}
