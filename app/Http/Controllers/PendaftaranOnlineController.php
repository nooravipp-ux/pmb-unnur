<?php

namespace App\Http\Controllers;
use DB;
use PDF;
use App\User;
use App\kelas;
use App\prodi;
use App\strata;
use App\fakultas;
use App\Mail\confirm;
use App\Mail\Pendaftaran;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PendaftaranOnlineController extends Controller
{
    public function aktivasi_calon_mhs(){
        $data_pendaftar = DB::table('fakultas')
                        ->join('prodi', 'fakultas.id_fakultas','=','prodi.id_fakultas')
                        ->join('strata', 'prodi.id_prodi','=','strata.id_prodi')
                        ->join('kelas', 'strata.id_strata','=','kelas.id_strata')
                        ->join('pmb_pendaftar','fakultas.id_fakultas','=','pmb_pendaftar.id_fakultas')
                        ->get();
                        $data_pendaftar = $data_pendaftar->unique('nik');
                        $data_pendaftar = $data_pendaftar->values()->all();

        //dd($data_pendaftar);
        return view('pendaftaran_online.aktivasi_calon_mhs', compact('data_pendaftar'));
    }
    public function mhs_lolos_seleksi(){
        $prodi = Auth::user()->id_prodi;
        $data_mhs = DB::table('pmb_pendaftar')
                    ->join('biodata','biodata.id_pendaftar','pmb_pendaftar.id_pendaftar')
                    ->where([['pmb_pendaftar.tahun', date('Y')],['pmb_pendaftar.lulus_seleksi', 1],['pmb_pendaftar.id_prodi', $prodi]])
                    ->get();

        return view('pendaftaran_online.mhs_terdaftar', compact('data_mhs'));
    }

    public function show_data_pendaftar($id){

        $list_pmb_pendaftar = DB::select("select id_fakultas from pmb_pendaftar where id_pendaftar='".$id."'");

        $sorted = Arr::get($list_pmb_pendaftar,0);
        $sortedd = Arr::flatten($sorted);
        $id_fak = Arr::get($sortedd,0);

        $list_prodi = DB::select("select id_prodi from pmb_pendaftar where id_pendaftar='".$id."'");

        $ap = Arr::get($list_prodi,0);
        $bp = Arr::flatten($ap);
        $id_prod = Arr::get($bp,0);

        $list_kelas = DB::select("select id_kelas from pmb_pendaftar where id_pendaftar='".$id."'");

        $ak = Arr::get($list_kelas,0);
        $bk = Arr::flatten($ak);
        $id_kel = Arr::get($bk,0);

        $list_pmb = DB::select("select id_pmb from pmb_pendaftar where id_pendaftar='".$id."'");

        $ab = Arr::get($list_pmb,0);
        $bb = Arr::flatten($ab);
        $id_b = Arr::get($bb,0);


        $detail_pendaftar = DB::table('fakultas')
                            ->join('prodi', 'fakultas.id_fakultas','=','prodi.id_fakultas')
                            ->join('strata', 'prodi.id_prodi','=','strata.id_prodi')
                            ->join('kelas', 'strata.id_strata','=','kelas.id_strata')
                            ->join('pmb_pendaftar','fakultas.id_fakultas','=','pmb_pendaftar.id_fakultas')
                            ->join('pmb', 'pmb_pendaftar.id_pmb','=','pmb.id_pmb')
                            ->join('pmb_biaya_registrasi', 'kelas.id_kelas','=','pmb_biaya_registrasi.kelas')
                            ->where([
                                ['pmb_pendaftar.id_pendaftar', $id],
                                ['fakultas.id_fakultas', $id_fak],
                                ['prodi.id_prodi', $id_prod],
                                ['kelas.id_kelas', $id_kel],
                                ['pmb_biaya_registrasi.id_pmb', $id_b]
                                ])
                            ->first();

                            //dd($detail_pendaftar);

        return view('pendaftaran_online.show_data_pendaftar', compact('detail_pendaftar'));
    }

    public function confirm_pembayaran_pmb(Request $request){
        // dd($request->all());
        $id_test = $this->generate_id_test($request->tahun, $request->gelombang, $request->id_prodi);
        DB::table('pmb_pendaftar')->where('id_pendaftar', $request->no_pendaftaran)->update(['status_pembayaran_registrasi' => 'SUDAH DI KONFIRMASI']);
        DB::table('pmb_pendaftar')->where('id_pendaftar', $request->no_pendaftaran)->update(['id_test' => $id_test]);

        $data_calon = DB::table('pmb_pendaftar')->where('id_pendaftar', $request->no_pendaftaran)->first();

        $db_ujian = DB::connection('mysql3');
        $data = $db_ujian->table('users')->insert([
            'username' => $id_test,
            'email' => $data_calon->email,
            'name' => $data_calon->nama,
            'password' => md5($id_test),
            'id_prodi' => $request->id_prodi,
            'status' => 'calon'
        ]);

        $get_id = $db_ujian->table('users')->select('id')->where('username', $id_test)->first();    

        $data_role = $db_ujian->table('role_user')->insert([
            'role_id' => '3',
            'user_id' => $get_id->id
        ]);

        $confirm = DB::table('pmb_pendaftar')->select('pmb_pendaftar.*')->get();
        \Mail::to($request->email)->send(new confirm($confirm));
        return redirect()->back()->with('sukses', 'Data Pendaftar Berhasil Di Update');
    }

    public function cetak_kwitansi_regis($id){
        $nama_op = Auth::user()->name;

        $list_pmb_pendaftar = DB::select("select id_fakultas from pmb_pendaftar where id_pendaftar='".$id."'");

        $sorted = Arr::get($list_pmb_pendaftar,0);
        $sortedd = Arr::flatten($sorted);
        $id_fak = Arr::get($sortedd,0);

        $list_prodi = DB::select("select id_prodi from pmb_pendaftar where id_pendaftar='".$id."'");

        $ap = Arr::get($list_prodi,0);
        $bp = Arr::flatten($ap);
        $id_prod = Arr::get($bp,0);

        $list_kelas = DB::select("select id_kelas from pmb_pendaftar where id_pendaftar='".$id."'");

        $ak = Arr::get($list_kelas,0);
        $bk = Arr::flatten($ak);
        $id_kel = Arr::get($bk,0);

        $list_pmb = DB::select("select id_pmb from pmb_pendaftar where id_pendaftar='".$id."'");

        $ab = Arr::get($list_pmb,0);
        $bb = Arr::flatten($ab);
        $id_b = Arr::get($bb,0);


        $detail_pendaftar = DB::table('fakultas')
                            ->join('prodi', 'fakultas.id_fakultas','=','prodi.id_fakultas')
                            ->join('strata', 'prodi.id_prodi','=','strata.id_prodi')
                            ->join('kelas', 'strata.id_strata','=','kelas.id_strata')
                            ->join('pmb_pendaftar','fakultas.id_fakultas','=','pmb_pendaftar.id_fakultas')
                            ->join('pmb', 'pmb_pendaftar.id_pmb','=','pmb.id_pmb')
                            ->join('pmb_biaya_registrasi', 'kelas.id_kelas','=','pmb_biaya_registrasi.kelas')
                            ->where([
                                ['pmb_pendaftar.id_pendaftar', $id],
                                ['fakultas.id_fakultas', $id_fak],
                                ['prodi.id_prodi', $id_prod],
                                ['kelas.id_kelas', $id_kel],
                                ['pmb_biaya_registrasi.id_pmb', $id_b]
                                ])
                            ->first();
                            //dd($detail_pendaftar);
        $pdf = PDF::loadview('pendaftaran_online.cetak_kwitansi_regis',['data_pendaftar'=>$detail_pendaftar, 'nama_op' => $nama_op])->setPaper('A5', 'landscape');
        return $pdf->stream();
        // return view('pendaftaran_online.cetak_kwitansi_regis');
    }

    public function generate_id_test($tahun, $gelombang, $prodi){
        $no = 1;
        $no_urut = "";
        $tahun_masuk = substr($tahun, -2);

        $no_urut = DB::select("SELECT '$tahun_masuk' AS tahun_masuk, '$gelombang' AS gelombang, '$prodi' AS prodi,LPAD((MAX(RIGHT(ID_TEST,4))+1),4,'0') AS no_urut_test FROM pmb_pendaftar WHERE LEFT(ID_TEST,2)= '$tahun_masuk' AND MID(ID_TEST, 4, 5) = '$prodi'");
        foreach($no_urut as $id_test){
            if($id_test->no_urut_test != NULL){
                return $no_urut = $id_test->tahun_masuk.$id_test->gelombang.$id_test->prodi.$id_test->no_urut_test;
            }else{
                return $no_urut = $tahun_masuk.$gelombang.$prodi.sprintf("%04s", $no);
            }
        }
    }
    public function info_registrasi(){
        $db_sistemik = DB::connection('mysql2');
        $data = $db_sistemik->table('agama')->get();

        $prodi = Auth::user()->id_prodi;
        $data_pendaftar = DB::table('pmb_pendaftar')
                        ->join('fakultas','fakultas.id_fakultas','=','pmb_pendaftar.id_fakultas')
                        ->join('prodi','prodi.id_prodi','=','pmb_pendaftar.id_prodi')
                        ->join('strata','strata.id_strata','=','pmb_pendaftar.id_jenjang_pend')
                        ->where([
                            ['pmb_pendaftar.id_prodi', $prodi],
                            ['tahun', date("Y")]
                        ])
                        ->distinct('pmb_pendaftar.id_pendaftar')
                        ->get();
                        // dd($data_pendaftar);
        return view('pendaftaran_online.info_registrasi', compact('data_pendaftar'));
    }

    public function detail_info_registrasi($id){

        $list_pmb_pendaftar = DB::select("select id_fakultas from pmb_pendaftar where id_pendaftar='".$id."'");

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
                            ->join('biodata', 'pmb_pendaftar.id_pendaftar', '=', 'biodata.id_pendaftar' )
                            ->where([
                                ['pmb_pendaftar.id_pendaftar', $id],
                                ['fakultas.id_fakultas', $id_fak]
                                ])
                            ->first();

        if(empty($data_pendaftar->file_foto) && empty($data_pendaftar->file_kk) && empty($data_pendaftar->file_ktp) && empty($data_pendaftar->file_akta) && empty($data_pendaftar->file_ijazah) && empty($data_pendaftar->file_ket_sehat)){
            return redirect('/operator/pendaftaran/info-registrasi')->with('error','Pendaftar Belum Melengkapi Data-Data');
        }else{
            return view('pendaftaran_online.detail_info_register', compact('data_pendaftar'));
        }
    }

    public function agama_get(Request $request){
        $db_sistemik = DB::connection('mysql2');
        $data_agama = $db_sistemik
                ->table('agama')
                ->where('id_agama', $request->id)
                ->first();

        return response()->json($data_agama);
    }

    public function provinsi_get(Request $request){
        $db_sistemik = DB::connection('mysql2');
        $data_provinsi = $db_sistemik
                ->table('v_wilayah')
                ->select('id_prov','provinsi')
                ->where('id_prov', $request->id)
                ->first();

        return response()->json($data_provinsi);
    }

    public function kota_get(Request $request){
        $db_sistemik = DB::connection('mysql2');
        $data_kota = $db_sistemik
                ->table('v_wilayah')
                ->select('id_kota','kota')
                ->where('id_kota', $request->id)
                ->first();

        return response()->json($data_kota);
    }

    public function kecamatan_get(Request $request){
        $db_sistemik = DB::connection('mysql2');
        $data_kecamatan = $db_sistemik
                ->table('v_wilayah')
                ->select('id_kec','kecamatan')
                ->where('id_kec', $request->id)
                ->first();

        return response()->json($data_kecamatan);
    }

    public function pendidikan_get(Request $request){
        $db_sistemik = DB::connection('mysql2');
        $data_pendidikan = $db_sistemik
                ->table('jenjang_pendidikan')
                ->select('id_jenj_didik','nm_jenj_didik')
                ->where('id_jenj_didik', $request->id)
                ->first();

        return response()->json($data_pendidikan);
    }

    public function pekerjaan_get(Request $request){
        $db_sistemik = DB::connection('mysql2');
        $data_pekerjaan = $db_sistemik
                ->table('pekerjaan')
                ->select('id_pekerjaan','nm_pekerjaan')
                ->where('id_pekerjaan', $request->id)
                ->first();

        return response()->json($data_pekerjaan);
    }

    public function penghasilan_get(Request $request){
        $db_sistemik = DB::connection('mysql2');
        $data_penghasilan = $db_sistemik
                ->table('penghasilan')
                ->select('id_penghasilan','nm_penghasilan')
                ->where('id_penghasilan', $request->id)
                ->first();

        return response()->json($data_penghasilan);
    }

    public function warganegara_get(Request $request){
        $db_sistemik = DB::connection('mysql2');
        $data_warganegara = $db_sistemik
                ->table('kewarganegaraan')
                ->select('kewarganegaraan','nm_wil')
                ->where('kewarganegaraan', $request->id)
                ->first();

        return response()->json($data_warganegara);
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

        // dd($request->all());

        $this->validate($request, [
            'nik' =>['required','numeric','unique:pmb_pendaftar'],
            'telp' =>['required','numeric'],
            'nama' =>['required','string','max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $tgl = date("Y-m-d");
        $list_pmb = DB::select("SELECT id_pmb FROM pmb WHERE start_date <= CAST('".$tgl."' AS DATE) AND finish_date >= CAST('".$tgl."' AS DATE)");



        if(empty($list_pmb)){

            return redirect('/daftar_awal')->with('error','Pendaftaran Belum Dibuka');

        }else{

            $sorted = Arr::get($list_pmb,0);
            $sortedd = Arr::flatten($sorted);
            $id_pmb = Arr::get($sortedd,0);

            DB::table('pmb_pendaftar')->insert([
                ['id_pmb' => $id_pmb,
                'nik' => $request->nik,
                'nama' => $request->nama,
                'email' => $request->email,
                'tahun' => $request->tahun,
                'id_jenjang_pend' => $request->jenjangp,
                'no_telepon' => $request->telp,
                'id_prodi' => $request->prodi,
                'id_fakultas' => $request->fakultas,
                'id_kelas' => $request->kelas,
                'created_at' => $tgl]
            ]);

            $list_pendaftar = DB::select("SELECT id_pendaftar from pmb_pendaftar where nik='".$request->nik."'");

            $convert = Arr::get($list_pendaftar,0);
            $convertt = Arr::flatten($convert);
            $id_pendaftar = Arr::get($convertt,0);

            DB::table('biodata')->insert([
                'id_pendaftar' => $id_pendaftar
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

            /**
             * mailable
             */
            $get = DB::table('users')->where('id',$id_user)->select('users.*')->first();
            $kel = DB::table('kelas')->where('id_kelas',$request->kelas)->select('kelas.nama_kelas')->first();
            $fak = DB::table('fakultas')->where('id_fakultas',$request->fakultas)->select('nama_fakultas')->first();
            $pro = DB::table('prodi')->where('id_prodi',$request->prodi)->select('prodi.*')->first();
            // dd($kel);
            try{
                \Mail::to($request->email)->send(new Pendaftaran($get,$fak,$pro,$kel));
            }catch(\Exception $e){
                return redirect('/login')->with('sukses','data berhasil di simpan');
            }
            /**
             * end mailable
             */
            return redirect('/login')->with('sukses','data berhasil di simpan');
        }



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

    public function count_total_register(){
        $id_prodi = Auth::user()->id_prodi;
        $total_pendaftar = DB::table('pmb_pendaftar')->where([['id_prodi', $id_prodi],['tahun', date('Y')]])->count();
        return response()->json($total_pendaftar);
    }

    public function count_today_register(){
        $id_prodi = Auth::user()->id_prodi;
        $total_pendaftar = DB::table('pmb_pendaftar')->where([['id_prodi', $id_prodi],['tahun', date('Y')],['created_at', date('Y-m-d')]])->count();
        return response()->json($total_pendaftar);
    }

    public function count_register_confirmed(){
        $id_prodi = Auth::user()->id_prodi;
        $total_pendaftar = DB::table('pmb_pendaftar')->where([['id_prodi', $id_prodi],['tahun', date('Y')],['status_pembayaran_registrasi', 'SUDAH DI KONFIRMASI']])->count();
        return response()->json($total_pendaftar);
    }
}
