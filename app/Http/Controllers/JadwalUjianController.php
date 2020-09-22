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
        // dd($request->all());
        $status_kelulusan = "";
        if($request->nilai_test >= 70){
            $status_kelulusan = "LULUS";
        }else{
            $status_kelulusan = "TIDAK LULUS";
        }
        DB::table('pmb_pendaftar')->where('id_test', $request->id_test)->update(['nilai_ujian'=> $request->nilai_test,'kelulusan' => $status_kelulusan]);
        $done = DB::table('pmb_pendaftar')->where('id_test',$request->id_test)->select('pmb_pendaftar.email')->first();
        $din = DB::table('pmb_pendaftar')->where('id_test',$request->id_test)->select('pmb_pendaftar.*')->first();

        \Mail::to($done)->send(new kelulusan($din));
        return response()->json('data success updated');
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
        DB::table('pmb_pendaftar')->where('id_test', $request->id_test)->update(['nim'=> $set_nim]);
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


    public function cek_passingrade(){

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
                            ->where([['pmb_pendaftar.tahun', '2020'],['pmb_pendaftar.kelulusan', 'LULUS']])
                            ->get();
        
        return view('ujian_pmb.laporan_kelulusan', compact('data_peserta_lulus'));
    }

    public function generate_nim($kode_prodi, $tahun, $jenis_daftar){
        $no = 1;
        $no_urut = "";
        $tahun_masuk = substr($tahun, -2);

        $no_urut = DB::select("SELECT '$kode_prodi' AS kode_prodi, '$jenis_daftar' AS jenis_daftar, '$tahun_masuk' AS tahun_angkatan, LPAD((RIGHT(MAX(NIM),3)+1),3,'0') AS no_urut FROM pmb_pendaftar WHERE LEFT(NIM,5) = '$kode_prodi' AND MID(NIM, 7, 2) = '$tahun_masuk'");
        foreach($no_urut as $nim){
            if($nim->no_urut != NULL){
                return $no_urut = $nim->kode_prodi.$nim->jenis_daftar.$nim->tahun_angkatan.$nim->no_urut;
            }else{
                return $no_urut = $kode_prodi.$jenis_daftar.$tahun_masuk.sprintf("%03s", $no);
            }
        }
    }
}
