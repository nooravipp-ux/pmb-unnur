<?php

namespace App\Http\Controllers;
use DB;
use App\User;
use App\kelas;
use App\prodi;
use App\strata;
use App\fakultas;
use App\Mail\Pendaftaran;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
                        $data_pendaftar = $data_pendaftar->values()->all();

        //dd($data_pendaftar);
        return view('pendaftaran_online.aktivasi_calon_mhs', compact('data_pendaftar'));
    }

    public function show_data_pendaftar($id){

        $list_pmb_pendaftar = DB::select("select id_fakultas from pmb_pendaftar where id_pendaftar='".$id."'");

        $sorted = Arr::get($list_pmb_pendaftar,0);
        $sortedd = Arr::flatten($sorted);
        $id_fak = Arr::get($sortedd,0);


        $detail_pendaftar = DB::table('pmb_pendaftar')
                            ->join('pmb', 'pmb_pendaftar.id_pmb','=','pmb.id_pmb')
                            ->join('pmb_biaya_registrasi', 'pmb.id_pmb','=','pmb_biaya_registrasi.id_pmb')
                            ->join('fakultas', 'pmb_biaya_registrasi.id_fakultas','=','fakultas.id_fakultas')
                            ->join('prodi', 'fakultas.id_fakultas','=','prodi.id_fakultas')
                            ->join('strata', 'prodi.id_prodi','=','strata.id_prodi')
                            ->join('kelas', 'strata.id_strata','=','kelas.id_strata')
                            ->where([
                                ['pmb_pendaftar.id_pendaftar', $id],
                                ['fakultas.id_fakultas', $id_fak]
                                ])
                            ->first();

                            //dd($detail_pendaftar);

        return view('pendaftaran_online.show_data_pendaftar', compact('detail_pendaftar'));
    }

    public function confirm_pembayaran_pmb(Request $request){
        // dd($request->tahun);
        $id_test = $this->generate_id_test($request->tahun, $request->gelombang, $request->id_prodi);
        DB::table('pmb_pendaftar')->where('id_pendaftar', $request->no_pendaftaran)->update(['status_pembayaran_registrasi' => 'SUDAH DI KONFIRMASI']);
        DB::table('pmb_pendaftar')->where('id_pendaftar', $request->no_pendaftaran)->update(['id_test' => $id_test]);

        //  \Mail::raw('ANJAY,Kamu telah terpilih menjadi salah satu keluarga dari universitas nurtanio Bandung,Gera verivikasi meh bisa dapet NIM', function ($message){
        //     $message->to('noor.avipp11@gmail.com', 'sandi');
        //     $message->subject('Subject');
        // });

        return redirect('/operator/pendaftaran/aktivasi-mhs')->with('status', 'Data Customer Berhasil Di Update');
    }

    public function generate_id_test($tahun, $gelombang, $prodi){
        $no = 1;
        $no_urut = "";
        $tahun_masuk = substr($tahun, -2);

        $no_urut = DB::select("SELECT '$tahun_masuk' AS tahun_masuk, '$gelombang' AS gelombang, '$prodi' AS prodi,LPAD((RIGHT(COUNT(ID_TEST),4)+1),4,'0') AS no_urut_test FROM pmb_pendaftar WHERE LEFT(ID_TEST,2)= '$tahun_masuk' AND MID(ID_TEST, 4, 4) = '$prodi'");
        foreach($no_urut as $id_test){
            if($id_test->no_urut_test != NULL){
                return $no_urut = $id_test->tahun_masuk.$id_test->gelombang.$id_test->prodi.$id_test->no_urut_test;
            }else{
                return $no_urut = $tahun.$gelombang.$prodi.sprintf("%04s", $no);
            }
        }
    }
    public function info_registrasi(){
        $prodi = Auth::user()->id_prodi;
        $data_pendaftar = DB::table('pmb_pendaftar')
                        ->join('fakultas','fakultas.id_fakultas','=','pmb_pendaftar.id_fakultas')
                        ->join('prodi','prodi.id_prodi','=','pmb_pendaftar.id_prodi')
                        ->where([
                            ['pmb_pendaftar.id_prodi', $prodi],
                            ['tahun', date("Y")]
                        ])
                        ->get();

        return view('pendaftaran_online.info_registrasi', compact('data_pendaftar'));
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

        if(empty($id_pmb)){

            return redirect('/login')->with('error','Registrasi Belum Dibuka');

        }else{
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
            $fak = DB::table('fakultas')->where('id_fakultas',$request->fakultas)->select('nama_fakultas')->first();
            $pro = DB::table('prodi')->where('id_prodi',$request->prodi)->select('prodi.*')->first();
            // dd($pro);
    
            \Mail::to($request->email)->send(new Pendaftaran($get,$fak,$pro));
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
        
    }


}
