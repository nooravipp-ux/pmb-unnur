<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function get_data_register_per_year(){
        $id_prodi = Auth::user()->id_prodi;
        $data_pendaftar = DB::select("SELECT tahun, COUNT(*) AS total_pendaftar FROM pmb_pendaftar WHERE id_prodi = '$id_prodi' GROUP BY tahun");
        return response()->json($data_pendaftar);
    }

    public function get_data_register_per_gelombang(){
        $id_prodi = Auth::user()->id_prodi;
        $data_pendaftar = DB::select("SELECT pmb.gelombang AS gelombang, COUNT(*) AS jumlah_pendaftar FROM pmb_pendaftar INNER JOIN pmb ON pmb_pendaftar.id_pmb = pmb.id_pmb WHERE pmb_pendaftar.id_prodi = '$id_prodi' GROUP BY gelombang");
        return response()->json($data_pendaftar);
    }

}
