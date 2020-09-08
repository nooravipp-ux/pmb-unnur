<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;

class CalonMhsController extends Controller
{
    public function formulir(){
        $email = Auth::user()->email;
        $data_pendaftar = DB::table('pmb_pendaftar')
                        ->join('pmb','pmb.id_pmb','=','pmb_pendaftar.id_pmb')
                        ->join('fakultas','fakultas.id_fakultas','=','pmb_pendaftar.id_fakultas')
                        ->join('prodi','prodi.id_prodi','=','pmb_pendaftar.id_prodi')
                        // ->join('pmb_biaya_registrasi','pmb_biaya_registrasi.id_pmb','=','pmb_pendaftar.id_pmb')
                        ->where('email', $email)
                        ->first();
        // dd($data_pendaftar);
        return view('calon_mahasiswa.formulir', compact('data_pendaftar'));
    }

    public function form_biodata(Request $request){
        $email = Auth::user()->email;
        $status_pembayaran = $this->cek_status_pembayaran($email);
        return view('calon_mahasiswa.form_biodata', compact('status_pembayaran'));
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
        

            if($request->metode == "transfer"){
                $this->validate($request, [
                    'file' => 'required|file|image|mimes:jpeg,png,jpg|max:1048'
                ]);

                $path = $request->file('file')->getRealPath();
                $bukti = file_get_contents($path);
                $base64 = base64_encode($bukti);
                DB::table('pmb_pendaftar')->where('id_pendaftar',$request->id_pendaftar)
                ->update([
                    'metode_pembayaran' => $request->metode,
                    'bukti_pem' => $base64,
                ]);
            }else if($request->metode == "cash"){
                DB::table('pmb_pendaftar')->where('id_pendaftar',$request->id_pendaftar)
                ->update([
                    'metode_pembayaran' => $request->metode,
                ]);
            }else{
                return redirect('/calon-mahasiswa/form-upload')->with('error','Data tidak lengkap'); 
            }


            return redirect('/calon-mahasiswa/form-upload')->with('sukses','data berhasil di simpan');    
    }

    public function cek_status_pembayaran($email){
        $user_mhs = DB::table('pmb_pendaftar')->select('status_pembayaran_registrasi')->where('email', $email)->first();
        if($user_mhs->status_pembayaran_registrasi == "LUNAS"){
            return true;
        }else{
            return false;
        }
    }
}
