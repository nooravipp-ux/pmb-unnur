<?php

namespace App\Http\Controllers;
use DB;
use App\jadwal;
use App\Mail\ujian;
use App\Mail\kelulusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalUjianController extends Controller
{
    public function jadwal_ujian(){
        $data_jadwal_ujian = DB::table('pmb_jadwal_ujian')
                            ->join('prodi','prodi.id_prodi','=','pmb_jadwal_ujian.id_prodi')
                            ->get();
        return view('ujian_pmb.jadwal_ujian_pmb', compact('data_jadwal_ujian'));
    }

    public function simpan_jadwal_ujian(Request $request){
        DB::table('pmb_jadwal_ujian')->insert(
            ['tanggal_ujian' => $request->tanggal_ujian, 'tahun' => $request->tahun, 'gelombang_ujian' => $request->gelombang, 'id_prodi' => $request->prodi, 'passingrade' => $request->passingrade]
        );

        return redirect('/operator/jadwal-ujian');
    }

    public function notif($id){
        $test = jadwal::findOrFail($id);
        $ing = DB::table('pmb')->join('pmb_pendaftar','pmb_pendaftar.id_pmb','=','pmb.id_pmb')->where('gelombang',$test->gelombang_ujian)->select('pmb_pendaftar.email')->get();
        $ujian = DB::table('pmb_jadwal_ujian')->where('id_jadwal_ujian',$id)->select('pmb_jadwal_ujian.*')->first();
        \Mail::to($ing)->send(new ujian($ujian));
        return redirect()->back();
    }

    public function entry_nilai_ujian(){
        $prodi = Auth::user()->id_prodi;
        $data_peserta_ujian = DB::table('pmb_pendaftar')->where('id_prodi', $prodi)->get();
        return view('ujian_pmb.entry_nilai_ujian', compact('data_peserta_ujian'));
    }

    public function update_nilai_ujian(Request $request){
        $id_prodi = Auth::user()->id_prodi;
        $status = $this->cek_passingrade($request->id_test, $request->nilai_test, $id_prodi);
        if($status == "LULUS" || $status == "TIDAK LULUS"){
            DB::table('pmb_pendaftar')->where('id_test', $request->id_test)->update(['nilai_ujian'=> $request->nilai_test,'kelulusan' => $status]);
            $done = DB::table('pmb_pendaftar')->where('id_test',$request->id_test)->select('pmb_pendaftar.email')->first();
            $din = DB::table('pmb_pendaftar')->where('id_test',$request->id_test)->select('pmb_pendaftar.*')->first();

            \Mail::to($done)->send(new kelulusan($din));
            return response()->json('data success updated');
        }

        return response()->json($status);
        
    }
    public function confirmasi_kelulusan(Request $request){
        // dd($request->all());
        $jenis_pendaftar = "";
        $tahun = date('Y');
        
        if($request->jenis_pendaftar == "Reguler"){
            $jenis_pendaftar = "1";
        }else{
            $jenis_pendaftar = "2";
        }
        $set_nim = $this->generate_nim($request->id_prodi, $tahun, $jenis_pendaftar);
        // dd($set_nim);
        DB::table('pmb_pendaftar')->where('id_test', $request->id_test)->update(['nim'=> $set_nim, 'lulus_seleksi' => 1]);
        $confirm_mhs_lulus = DB::table('pmb_pendaftar')
                            ->join('biodata','biodata.id_pendaftar','pmb_pendaftar.id_pendaftar')
                            ->where('id_test', $request->id_test)->first();
        // dd($set_nim);
        $db_sistemik = DB::connection('mysql2');
        

        $db_sistemik->table('mhs')->insert(
            ['nm_pd' => $confirm_mhs_lulus->nama, 'jk' => $confirm_mhs_lulus->jenis_kelamin,'nipd' => $set_nim, 'nik' => $confirm_mhs_lulus->nik,
            'tmpt_lahir' => $confirm_mhs_lulus->tempat_lahir, 'id_agama' => $confirm_mhs_lulus->agama,'jln' => $confirm_mhs_lulus->jln, 'rt' => $confirm_mhs_lulus->rt,
            'rw' => $confirm_mhs_lulus->rw, 'nm_dsn' => '','ds_kel' => $confirm_mhs_lulus->ds_kel, 'id_wil' => $confirm_mhs_lulus->id_wil,
            'kode_pos' => $confirm_mhs_lulus->kode_pos, 'id_jns_tinggal' => $confirm_mhs_lulus->jenis_tinggal,'id_alat_transport' => $confirm_mhs_lulus->alat_transportasi, 'no_hp' => $confirm_mhs_lulus->no_telephone,
            'email' => $confirm_mhs_lulus->email, 'nik_ayah' => $confirm_mhs_lulus->nik_ayah,'nm_ayah' => $confirm_mhs_lulus->nama_ayah, 'tgl_lahir_ayah' => $confirm_mhs_lulus->tgl_lahir_ayah,
            'id_jenjang_pendidikan_ayah' => $confirm_mhs_lulus->pendidikan_ayah, 'id_kebutuhan_khusus_ayah' => 1,'id_kebutuhan_khusus_ibu' => 1, 'id_pekerjaan_ayah' => $confirm_mhs_lulus->pekerjaan_ayah,
            'id_penghasilan_ayah' => $confirm_mhs_lulus->penghasilan_ayah, 'nik_ibu' => $confirm_mhs_lulus->nik_ibu,'nm_ibu_kandung' => $confirm_mhs_lulus->nama_ibu, 'tgl_lahir_ibu' => $confirm_mhs_lulus->tgl_lahir_ibu,
            'id_jenjang_pendidikan_ibu' => $confirm_mhs_lulus->pendidikan_ibu, 'id_penghasilan_ibu' => $confirm_mhs_lulus->penghasilan_ibu,'id_pekerjaan_ibu' => $confirm_mhs_lulus->pekerjaan_ibu, 'kewarganegaraan' => '',
            'kode_jurusan' => $confirm_mhs_lulus->id_prodi, 'stat_pd' => '0','a_terima_kps' => '0','tgl_masuk_sp' => date('Y-m-d'),'mulai_smt' => date('Y').'1','status_error' => 1,'keterangan' => 1,'id_kurikulum' => $confirm_mhs_lulus->id_prodi,'id_jalur_masuk' => ''
            ]
        );
        return response()->json('data success updated');
    }
    public function get_data_peserta_ujian(Request $request){
        $prodi = Auth::user()->id_prodi;
        if ($request->has('q')) {
            $cari = $request->q;
            $data_peserta = DB::table('pmb_pendaftar')->select('id_test','nama')->where([['id_prodi', $prodi],['status_pembayaran_registrasi', 'SUDAH DI KONFIRMASI'],['nama', 'LIKE', '%'.$cari.'%']])->get();

            return response()->json($data_peserta);
        }
        $data_peserta= DB::table('pmb_pendaftar')->where([['id_prodi', $prodi],['status_pembayaran_registrasi', 'SUDAH DI KONFIRMASI']])->select('id_test','nama')->get();

        return response()->json($data_peserta);
    }

    public function load_data_peserta_ujian(){
        $prodi = Auth::user()->id_prodi;
        $data_peserta_ujian = DB::table('pmb_pendaftar')->where([['id_prodi', $prodi],['status_pembayaran_registrasi', 'SUDAH DI KONFIRMASI']])->get();
        return response()->json($data_peserta_ujian);
    }


    public function cek_passingrade($id_test, $nilai_ujian, $id_prodi){
        $status = "";
        $data_pmb = DB::table('pmb_pendaftar')
                    ->join('pmb', 'pmb.id_pmb','pmb_pendaftar.id_pmb')
                    ->where('pmb_pendaftar.id_test', $id_test)
                    ->first();
        $gelombang_ujian = $data_pmb->gelombang;
        $data = DB::table('pmb_jadwal_ujian')->select('passingrade')->where([['tahun', date('Y')],['gelombang_ujian', $gelombang_ujian],['id_prodi', $id_prodi]])->first();
        // dd($data);
        if($data != NULL){
            $pass = $data->passingrade;
            if($nilai_ujian >= $pass){
                $status = "LULUS";
                return $status;
            }else{
                $status = "TIDAK LULUS";
                return $status;
            }
            
        }else{
            $status = "Data gagal di Update ,Passingrade blum disetting !!!";
            return $status;
        }
    }

    public function count_peserta_ujian(){
        $prodi = Auth::user()->id_prodi;
        $total_peserta_ujian = DB::table('pmb_pendaftar')->where([['id_prodi', $prodi],['status_pembayaran_registrasi', 'SUDAH DI KONFIRMASI']])
                                ->whereNotNull('id_test')
                                ->count();
        return response()->json($total_peserta_ujian);
    }

    public function count_peserta_ujian_lulus(){
        $prodi = Auth::user()->id_prodi;
        $total_peserta_ujian_lulus = DB::table('pmb_pendaftar')->where([['id_prodi', $prodi],['status_pembayaran_registrasi', 'SUDAH DI KONFIRMASI'],['kelulusan', 'LULUS']])
                                ->whereNotNull('id_test')
                                ->count();
        return response()->json($total_peserta_ujian_lulus);
    }

    public function count_peserta_ujian_tidak_lulus(){
        $prodi = Auth::user()->id_prodi;
        $total_peserta_ujian_tidak_lulus = DB::table('pmb_pendaftar')->where([['id_prodi', $prodi],['status_pembayaran_registrasi', 'SUDAH DI KONFIRMASI'],['kelulusan', 'TIDAK LULUS']])
                                ->whereNotNull('id_test')
                                ->count();
        return response()->json($total_peserta_ujian_tidak_lulus);
    }

    public function laporan_kelulusan(){
        $data_peserta_lulus = DB::table('pmb_pendaftar')
                            ->join('pmb','pmb.id_pmb','=','pmb_pendaftar.id_pmb')
                            ->where([['pmb_pendaftar.tahun', '2020'],['pmb_pendaftar.status_pembayaran_registrasi','SUDAH DI KONFIRMASI']])
                            ->get();
        
        return view('ujian_pmb.laporan_kelulusan', compact('data_peserta_lulus'));
    }

    public function generate_nim($kode_prodi, $tahun, $jenis_daftar){
        $db_sistemik = DB::connection('mysql2');
        $no = 1;
        $no_urut = "";
        $tahun_masuk = substr($tahun, -2);

        $no_urut = $db_sistemik->select("SELECT '$kode_prodi' AS kode_prodi, '$jenis_daftar' AS jenis_daftar, '$tahun_masuk' AS tahun_angkatan, LPAD((MAX(RIGHT(nipd,3))+1),3,'0') AS no_urut FROM mhs WHERE LEFT(NIPD,5) = '$kode_prodi' AND MID(NIPD, 7, 2) = '$tahun_masuk'");
        foreach($no_urut as $nim){
            if($nim->no_urut != NULL){
                return $no_urut = $nim->kode_prodi.$nim->jenis_daftar.$nim->tahun_angkatan.$nim->no_urut;
            }else{
                return $no_urut = $kode_prodi.$jenis_daftar.$tahun_masuk.sprintf("%03s", $no);
            }
        }
    }
}
