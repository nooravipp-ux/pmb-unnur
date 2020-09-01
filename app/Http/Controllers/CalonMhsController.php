<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalonMhsController extends Controller
{
    public function calon_mhs(){
        return view('calon_mahasiswa.calon_mhs');
    }
}
