<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalonMhsController extends Controller
{
    public function formulir(){
        return view('calon_mahasiswa.formulir');
    }

    public function form_biodata(){
        return view('calon_mahasiswa.form_biodata');
    }
    public function form_upload(){
        return view('calon_mahasiswa.form_upload');
    }
}
