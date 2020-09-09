<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\User;
use App\fakultas;
use App\prodi;
use App\strata;
use App\kelas;
use DB;

class PendaftaranOnlineController extends Controller
{
    public function aktivasi_calon_mhs(){
        $data_pendaftar = DB::table('pmb_pendaftar')
                        ->join('fakultas', 'pmb_pendaftar.id_fakultas','=','fakultas.id_fakultas')
                        ->join('prodi', 'fakultas.id_fakultas','=','prodi.id_fakultas')
                        ->join('strata', 'prodi.id_prodi','=','strata.id_prodi')
                        ->join('kelas', 'strata.id_strata','=','kelas.id_strata')
                        ->select('pmb_pendaftar.*','fakultas.*','prodi.*','strata.*','kelas.*')                 
                        ->get();
                        $data_pendaftar = $data_pendaftar->unique('nik');
                        $data_pendaftar = array_slice($data_pendaftar->values()->all(), 0, 5, true);

        //dd($data_pendaftar);
        return view('pendaftaran_online.aktivasi_calon_mhs', compact('data_pendaftar'));
    }

    public function show_data_pendaftar($id){
        $detail_pendaftar = DB::table('pmb_pendaftar')
                            ->join('prodi', 'prodi.id_prodi','=','pmb_pendaftar.id_prodi')
                            ->where('id_pendaftar', $id)
                            ->first();
        return view('pendaftaran_online.show_data_pendaftar', compact('detail_pendaftar'));
    }

    public function confirm_pembayaran_pmb(Request $request){
        // dd($request->all());
        DB::table('pmb_pendaftar')->where('id_pendaftar', $request->no_pendaftaran)->update(['status_pembayaran_registrasi' => 'SUDAH DI KONFIRMASI']);

        //  \Mail::raw('ANJAY,Kamu telah terpilih menjadi salah satu keluarga dari universitas nurtanio Bandung,Gera verivikasi meh bisa dapet NIM', function ($message){
        //     $message->to('noor.avipp11@gmail.com', 'sandi');
        //     $message->subject('Subject');
        // });

        return redirect('/operator/pendaftaran/aktivasi-mhs')->with('status', 'Data Customer Berhasil Di Update');
    }

    public function info_registrasi(){
        return view('pendaftaran_online.info_registrasi');
    }

    //pendaftaran awal
    public function daftar_awal(){
        //$list_fakultas = DB::select("SELECT * FROM pmb INNER JOIN pmb_biaya_registrasi ON pmb.id_pmb = pmb_biaya_registrasi.id_pmb
        //INNER JOIN fakultas ON pmb_biaya_registrasi.id_fakultas = fakultas.id_fakultas");

        $list_fakultas = DB::select("select * from fakultas");
        //dd($list_fakultas);

        return view('pendaftaran_online.daftar_awal',['list_fakultas' => $list_fakultas]);
    }

    public function update_data_informasi_pendaftaran(){
        DB::table('pmb_pendaftar')->where('id_pendaftar', $request->no_pendaftaran)->update(['status' => 'SUDAH DI KONFIRMASI']);
    }

    public function get_prodi(Request $request){
        $list_prodi = prodi::where('id_fakultas',$request->id_fakultas)->get();

        return response()->json($list_prodi);
    }

    public function get_strata(Request $request){
        $list_strata = strata::where('id_prodi',$request->id_prodi)->get();

        return response()->json($list_strata);
    }

    public function get_kelas(Request $request){
        $list_kelas = kelas::where('id_strata',$request->id_strata)->get();

        return response()->json($list_kelas);
    }

    public function get_biaya(Request $request){

        $list_biaya = DB::table('pmb_biaya_registrasi')->where([
            ['id_fakultas','=', $request->id_fakultas],
            ['strata','=', $request->id_strata],
            ['kelas','=', $request->id_kelas]
        ])->first();

        return response()->json($list_biaya);
    }


    public function simpan_calonmhs(Request $request){

        $this->validate($request, [
            'nik' =>['required','numeric','unique:pmb_pendaftar'],
            'telp' =>['required','numeric'],
            'nama' =>['required','string','max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $tgl = date("Y-m-d");
        $list_pmb = DB::select("SELECT id_pmb FROM pmb WHERE start_date <= CAST('".$tgl."' AS DATE) AND finish_date >= CAST('".$tgl."' AS DATE)");
    
        $sorted = Arr::get($list_pmb,0);
        $sortedd = Arr::flatten($sorted);
        $id_pmb = Arr::get($sortedd,0);    
           
        //dd($sorteddd);  

        DB::table('pmb_pendaftar')->insert([
            ['id_pmb' => $id_pmb,
            'nik' => $request->nik,
            'nama' => $request->nama,
            'email' => $request->email,
            'tahun' => $request->tahun,
            'id_jenjang_pend' => $request->jenjangp,
            'no_telepon' => $request->telp,
            'id_prodi' => $request->prodi,
            'id_fakultas' => $request->fakultas]
        ]);

        $cari_id = DB::table('users')
        ->select('id')
        ->where('email', $request->email )->first();
        //dd($cari_id);  

        DB::table('users')->insert([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
            'id_prodi' => $request->prodi,
        ]);

        $cari_id = User::select('id')
        ->where('email', $request->email )->get()->toArray();

        $id = Arr::get($cari_id,0);
        $id_user = Arr::get($id,"id");

        //dd($tes);

        DB::table('role_user')->insert([
            'role_id' => '4',
            'user_id' => $id_user
        ]);

        return redirect('/login')->with('sukses','data berhasil di simpan');
    }

    public function daftar_awal_upload(Request $request){
        return view('pendaftaran_online.daftar_awal_upload');
    }

    public function get_data_calonmhs(Request $request){


        $list_calonmhs = DB::table('pmb_pendaftar')
        ->join('pmb', 'pmb_pendaftar.id_pmb','=','pmb.id_pmb')
        ->join('pmb_biaya_registrasi', 'pmb.id_pmb','=','pmb_biaya_registrasi.id_pmb')
        ->join('fakultas', 'pmb_biaya_registrasi.id_fakultas','=','fakultas.id_fakultas')
        ->join('prodi', 'fakultas.id_fakultas','=','prodi.id_fakultas')
        ->join('strata', 'prodi.id_prodi','=','strata.id_prodi')
        ->join('kelas', 'strata.id_strata','=','kelas.id_strata')
        ->where('pmb_pendaftar.id_pendaftar', $request->id_pendaftar)
        ->first();

        //$list_calonmhs = head($list_data);

        return response()->json($list_calonmhs);
    }
    //pendaftaran awal end


}
