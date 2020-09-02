<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use DB;

class PendaftaranOnlineController extends Controller
{
    public function aktivasi_calon_mhs(){
        $id_fakultas = Auth::user()->id_fakultas;
        $data_pendaftar = DB::table('pmb_pendaftar')
                        ->join('fakultas', 'fakultas.id_fakultas','=','pmb_pendaftar.id_fakultas')
                        ->where('pmb_pendaftar.id_fakultas', $id_fakultas)
                        ->get();
        // dd($data_pendaftar);
        return view('pendaftaran_online.aktivasi_calon_mhs', compact('data_pendaftar'));
    }

    public function show_data_pendaftar($id){
        $detail_pendaftar = DB::table('pmb_pendaftar')
                            ->join('fakultas', 'fakultas.id_fakultas','=','pmb_pendaftar.id_fakultas')
                            ->where('id_pendaftar', $id)
                            ->first();
        return view('pendaftaran_online.show_data_pendaftar', compact('detail_pendaftar'));
    }

    public function confirm_pembayaran_pmb(Request $request){
        // dd($request->all());
        DB::table('pmb_pendaftar')->where('id_pendaftar', $request->no_pendaftaran)
        ->update(['status' => 'LUNAS']);

        return redirect('/operator/pendaftaran/aktivasi-mhs')->with('status', 'Data Customer Berhasil Di Update');
    }

    public function info_registrasi(){
        return view('pendaftaran_online.info_registrasi');
    }
}
