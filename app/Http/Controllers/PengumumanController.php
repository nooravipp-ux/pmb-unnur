<?php

namespace App\Http\Controllers;

use App\Mail\brodcast;
use App\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PengumumanController extends Controller
{
    public function mading_pengunguman(){
        $nama_user = Auth::user()->name;
        $pengunguman = DB::table('pmb_pengumuman')
                    ->join('pmb', 'pmb.id_pmb','pmb_pengumuman.id_pmb')
                    ->join('pmb_pendaftar', 'pmb_pendaftar.id_pmb','pmb.id_pmb')
                    ->where([['pmb_pendaftar.nama', $nama_user],['pmb_pendaftar.kelulusan', 'LULUS'],['pmb_pengumuman.status', 1]])
                    ->get();
        return view('pengunguman.pengunguman_kelulusan', compact('pengunguman'));
    }
    public function index(){
        $email = Pengumuman::all();
        return view('emails.index',compact('email'));
    }

    public function store(Request $req){
        Pengumuman::create($req->all());
        return redirect()->back()->with('sukses','data berhasil di tambah');
    }

    public function update($id){
        DB::table('pmb_pengumuman')->where('id',$id)->where('status',0)->update(['status'=>1]);
        return redirect()->back();
    }

    public function destroy(Pengumuman $pengumuman){
        $pengumuman->delete($pengumuman);
        return redirect()->back()->with('sukses','data berhasil di hapus');
    }

    public function sebar($id){
        $email_us = DB::table('users')->select('users.email')->get();
        $get = DB::table('set_email')->where('id',$id)->select('set_email.*')->first();
        DB::table('set_email')->where('id',$id)->where('status',1)->update(['status'=>0]);
       return redirect()->back();
    }
}
