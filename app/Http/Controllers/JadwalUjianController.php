<?php

namespace App\Http\Controllers;
use DB;
use App\jadwal;
use App\Mail\ujian;
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

        $data_jadwal_ujian = DB::table('pmb_jadwal_ujian')
                            ->join('prodi','prodi.id_prodi','=','pmb_jadwal_ujian.id_prodi')
                            ->get();
        return view('ujian_pmb.jadwal_ujian_pmb', compact('data_jadwal_ujian'));
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

        DB::table('pmb_pendaftar')->where('id_test', $request->id_test)->update(['nilai_ujian'=> $request->nilai_test]);
        return response()->json('data success updated');
    }
    public function get_data_peserta_ujian(Request $request){
        $prodi = Auth::user()->id_prodi;
        if ($request->has('q')) {
            $cari = $request->q;
            $data_peserta = DB::table('pmb_pendaftar')->select('id_test','nama')->where([['id_prodi', $prodi],['nama', 'LIKE', '%'.$cari.'%']])->get();

            return response()->json($data_peserta);
        }
        $data_peserta= DB::table('pmb_pendaftar')->where('id_prodi', $prodi)->select('id_test','nama')->get();

        return response()->json($data_peserta);
    }

    public function load_data_peserta_ujian(){
        $prodi = Auth::user()->id_prodi;
        $data_peserta_ujian = DB::table('pmb_pendaftar')->where([['id_prodi', $prodi],['status_pembayaran_registrasi', 'SUDAH DI KONFIRMASI']])->get();
        return response()->json($data_peserta_ujian);
    }
}
