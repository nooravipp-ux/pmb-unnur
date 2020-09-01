<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PendaftaranOnlineController extends Controller
{
    public function aktivasi_calon_mhs(){

        return view('pendaftaran_online.aktivasi_calon_mhs');
    }

    public function info_registrasi(){
        return view('pendaftaran_online.info_registrasi');
    }
}
