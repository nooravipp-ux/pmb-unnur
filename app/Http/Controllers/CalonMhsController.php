<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use DB;
use Image;

class CalonMhsController extends Controller
{
    public function formulir(){
        $email = Auth::user()->email;

        $list_pmb_pendaftar = DB::select("select id_fakultas from pmb_pendaftar where email='".$email."'");

        $sorted = Arr::get($list_pmb_pendaftar,0);
        $sortedd = Arr::flatten($sorted);
        $id_fak = Arr::get($sortedd,0);

        $data_pendaftar = DB::table('pmb_pendaftar')
                        ->join('pmb', 'pmb_pendaftar.id_pmb','=','pmb.id_pmb')
                        ->join('pmb_biaya_registrasi', 'pmb.id_pmb','=','pmb_biaya_registrasi.id_pmb')
                        ->join('fakultas', 'pmb_biaya_registrasi.id_fakultas','=','fakultas.id_fakultas')
                        ->join('prodi', 'fakultas.id_fakultas','=','prodi.id_fakultas')
                        ->join('strata', 'prodi.id_prodi','=','strata.id_prodi')
                        ->join('kelas', 'strata.id_strata','=','kelas.id_strata')
                        ->join('biodata','pmb_pendaftar.id_pendaftar','=','biodata.id_pendaftar')
                        ->where([
                            ['pmb_pendaftar.email', $email],
                            ['fakultas.id_fakultas', $id_fak]
                            ])
                        ->first();
        // dd($data_pendaftar);
        return view('calon_mahasiswa.formulir', compact('data_pendaftar'));
    }

    public function update_formulir(Request $request){
        DB::table('pmb_pendaftar')->where('id_pendaftar',$request->id_pendaftar)
        ->update([
            'no_telepon' => $request->no_telepon,
            'jalur_masuk' => $request->jalur_masuk,
            'jenis_pendaftar' => $request->jenis_pendaftar,
        ]);

        DB::table('biodata')->where('id_pendaftar',$request->id_pendaftar)
        ->update([
            'no_telp_ortu' => $request->no_telp_ortu
        ]);

        return redirect('/calon-mahasiswa/formulir')->with('sukses','data berhasil di simpan');
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
             
        ]);
        $email = Auth::user()->email;
        $status_pembayaran = $this->cek_status_pembayaran($email);
        $data_pendaftar = DB::table('pmb_pendaftar')
                        ->join('biodata','biodata.id_pendaftar','=','pmb_pendaftar.id_pendaftar')
                        ->where('.pmb_pendaftar.email', $email)->first();
        return view('calon_mahasiswa.form_biodata', compact('status_pembayaran','data_pendaftar'));
    }
    public function form_upload(){
        $email = Auth::user()->email;
        $status_pembayaran = $this->cek_status_pembayaran($email);
        $status_formulir = $this->cek_formulir($email);
        return view('calon_mahasiswa.form_upload', ['status_pembayaran' => $status_pembayaran, 'status_formulir' => $status_formulir]);
    }

    public function get_data_calonmhs(Request $request){
        // $list_data = DB::select("SELECT * FROM pmb_pendaftar  INNER JOIN pmb ON pmb_pendaftar.`id_pmb` = pmb.`id_pmb`
        // INNER JOIN pmb_biaya_registrasi ON pmb.`id_pmb` = pmb_biaya_registrasi.`id_pmb`
        // INNER JOIN fakultas ON pmb_biaya_registrasi.`id_fakultas` = fakultas.`id_fakultas`
        // INNER JOIN prodi ON fakultas.`id_fakultas` = prodi.`id_fakultas`
        // INNER JOIN strata ON prodi.`id_prodi` = strata.`id_prodi`
        // INNER JOIN kelas ON strata.`id_strata` = kelas.`id_strata`
        // WHERE pmb_pendaftar.`id_pendaftar`='" + $request->id_pendaftar + "'");

        $list_pmb_pendaftar = DB::select("select id_fakultas from pmb_pendaftar where email='".$request->email."'");

        $sorted = Arr::get($list_pmb_pendaftar,0);
        $sortedd = Arr::flatten($sorted);
        $id_fak = Arr::get($sortedd,0);

        $list_calonmhs = DB::table('pmb_pendaftar')
        ->join('pmb', 'pmb_pendaftar.id_pmb','=','pmb.id_pmb')
        ->join('pmb_biaya_registrasi', 'pmb.id_pmb','=','pmb_biaya_registrasi.id_pmb')
        ->join('fakultas', 'pmb_biaya_registrasi.id_fakultas','=','fakultas.id_fakultas')
        ->join('prodi', 'fakultas.id_fakultas','=','prodi.id_fakultas')
        ->join('strata', 'prodi.id_prodi','=','strata.id_prodi')
        ->join('kelas', 'strata.id_strata','=','kelas.id_strata')
        ->join('users','pmb_pendaftar.email','=','users.email')
        ->where([
            ['pmb_pendaftar.email', $request->email],
            ['fakultas.id_fakultas', $id_fak]
            ])
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

                // $path = $request->file('file')->getRealPath();
                // $bukti = file_get_contents($path);
                // $base64 = base64_encode($bukti);
                $bukti = Image::make($request->file)->fit(500)->encode('data-url');
                DB::table('pmb_pendaftar')->where('id_pendaftar',$request->id_pendaftar)
                ->update([
                    'metode_pembayaran' => $request->metode,
                    'atas_nama' => $request->atas_nama,
                    'bukti_pem' => $bukti,
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

    public function form_up_doc(){

        $email = Auth::user()->email;
        $status_pembayaran = $this->cek_status_pembayaran($email);

        return view('calon_mahasiswa.form_document', compact('status_pembayaran'));
    }

    public function update_form_document(Request $request){
        $this->validate($request, [
            'file_ktp' => 'required|file|image|mimes:jpeg,png,jpg|max:1048',
            'file_foto' => 'required|file|image|mimes:jpeg,png,jpg|max:1048',
            'file_kk' => 'required|file|image|mimes:jpeg,png,jpg|max:1048',
            'file_akta' => 'required|file|image|mimes:jpeg,png,jpg|max:1048',
            'file_ijazah' => 'required|file|image|mimes:jpeg,png,jpg|max:1048',
            'file_ket_sehat' => 'required|file|image|mimes:jpeg,png,jpg|max:1048',
        ]);

                // $path_ktp = $request->file('file_ktp')->getRealPath();
                // $ktp = file_get_contents($path_ktp);
                // $base64_ktp = base64_encode($ktp);

                // $path_foto = $request->file('file_foto')->getRealPath();
                // $foto = file_get_contents($path_foto);
                // $base64_foto = base64_encode($foto);

                // $path_kk = $request->file('file_kk')->getRealPath();
                // $kk = file_get_contents($path_kk);
                // $base64_kk = base64_encode($kk);

                // $path_akta = $request->file('file_akta')->getRealPath();
                // $akta = file_get_contents($path_akta);
                // $base64_akta = base64_encode($akta);

                // $path_ijazah = $request->file('file_ijazah')->getRealPath();
                // $ijazah = file_get_contents($path_ijazah);
                // $base64_ijazah = base64_encode($ijazah);

                // $path_ket_sehat = $request->file('file_ket_sehat')->getRealPath();
                // $ket_sehat = file_get_contents($path_ket_sehat);
                // $base64_ket_sehat = base64_encode($ket_sehat);
                $ktp = Image::make($request->file_ktp)->fit(500)->encode('data-url');
                $foto = Image::make($request->file_foto)->fit(500)->encode('data-url');
                $kk = Image::make($request->file_kk)->fit(500)->encode('data-url');
                $akta = Image::make($request->file_akta)->fit(500)->encode('data-url');
                $ijazah = Image::make($request->file_ijazah)->fit(500)->encode('data-url');
                $ket_sehat = Image::make($request->file_ket_sehat)->fit(500)->encode('data-url');

                DB::table('biodata')->where('id_pendaftar',$request->id_pendaftar)
                ->update([
                    'file_ktp' => $ktp,
                    'file_foto' => $foto,
                    'file_kk' => $kk,
                    'file_akta' => $akta,
                    'file_ijazah' => $ijazah,
                    'file_ket_sehat' => $ket_sehat,
                ]);

                return redirect('/calon-mahasiswa/form-document')->with('sukses','data berhasil di simpan');
    }

    public function get_document(Request $request){
        $list_document = DB::table('users')
        ->join('pmb_pendaftar' ,'users.email','=','pmb_pendaftar.email')
        ->join('biodata','pmb_pendaftar.id_pendaftar','=','biodata.id_pendaftar')
        ->where('users.email', $request->email)
        ->first();
        
        return response()->json($list_document);
    }

    public function cek_formulir($email){
        $user_mhs = DB::table('pmb_pendaftar')->where('email', $email)->first();
        if(empty($user_mhs->jalur_masuk) && empty($user_mhs->jenis_pendaftar)){
            return true;
        }else{
            return false;
        }
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
