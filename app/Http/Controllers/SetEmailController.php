<?php

namespace App\Http\Controllers;

use App\Mail\brodcast;
use App\set_email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SetEmailController extends Controller
{
    public function index(){
        $email = set_email::all();
        return view('emails.index',compact('email'));
    }

    public function store(Request $req){
        set_email::create($req->all());
        return redirect()->back()->with('sukses','data berhasil di tambah');
    }

    public function update($id){
        DB::table('set_email')->where('id',$id)->where('status',0)->update(['status'=>1]);
        return redirect()->back()->with('sukses','data berhasil di rubah');
    }

    public function destroy(set_email $set_email){
        $set_email->delete($set_email);
        return redirect()->back()->with('sukses','data berhasil di hapus');
    }

    public function sebar($id){
        $email_us = DB::table('users')->select('users.email')->get();
        $get = DB::table('set_email')->where('id',$id)->select('set_email.*')->first();
        foreach ($email_us as $email) {
            # code...
            \Mail::to($email)->send(new brodcast($get));
        }
        DB::table('set_email')->where('id',$id)->where('status',1)->update(['status'=>0]);
       return redirect()->back();
    }
}
