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
        $data_pendaftar = DB::table('pmb_pendaftar')
                        ->join('biodata','biodata.id_pendaftar','=','pmb_pendaftar.id_pendaftar')
                        ->where('.pmb_pendaftar.email', $email)->first();
        // dd($data_pendaftar);
        
        return view('calon_mahasiswa.form_biodata', compact('status_pembayaran','data_pendaftar'));
    }

    public function update_form_biodata(Request $request){
        // dd($request->all());
        DB::table('biodata')->where('id_pendaftar', $request->id_pendaftar)->update([
            ['id_pendaftar' => $request->id_pendaftar,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'warganegara' => $request->warganegara,
             'agama' => $request->agama, 
             'alamat' => $request->alamat,
             'kelurahan' => $request->kelurahan_desa,
             'kode_pos' => $request->kode_pos,
             'kecamatan' => $request->kecamatan, 
             'kota_kab' => $request->kota,
             'provinsi' => $request->provinsi,
             'email' => $request->email,
             'no_telephone' => $request->no_telepon,
             'nik_ayah' => $request->nik_ayah,
             'nama_ayah' => $request->nama_ayah,
             'tgl_lahir_ayah' => $request->tgl_lahir_ayah,
             'pendidikan_ayah' => $request->pendidikan_ayah, 
             'pekerjaan_ayah' => $request->pekerjaan_ayah,
             'penghasilan_ayah' => $request->penghasilan_ayah,
             'nik_ibu' => $request->nik_ibu,
             'nama_ibu' => $request->nama_ibu,
             'tgl_lahir_ibu' => $request->tgl_lahir_ibu, 
             'pendidikan_ibu' => $request->pendidikan_ibu,
             'pekerjaan_ibu' => $request->pekerjaan_ibu,
             'penghasilan_ibu' => $request->penghasilan_ibu
             ]
        ]);
        return view('calon_mahasiswa.form_biodata');
    }
    public function form_upload(){
        $email = Auth::user()->email;
        $status_pembayaran = $this->cek_status_pembayaran($email);
        return view('calon_mahasiswa.form_upload', compact('status_pembayaran'));
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
                    'file' => 'required|file|image|mimes:jpeg,png,jpg|max:1048',
                    'atas_nama' => 'required|string'
                ]);

                $path = $request->file('file')->getRealPath();
                $bukti = file_get_contents($path);
                $base64 = base64_encode($bukti);
                DB::table('pmb_pendaftar')->where('id_pendaftar',$request->id_pendaftar)
                ->update([
                    'metode_pembayaran' => $request->metode,
                    'atas_nama' => $request->atas_nama,
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
        if($user_mhs->status_pembayaran_registrasi == "SUDAH DI KONFIRMASI"){
            return true;
        }else{
            return false;
        }
    }
}
