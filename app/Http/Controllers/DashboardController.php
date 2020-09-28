<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
class DashboardController extends Controller
{
    public function index()
    {
        $email = Auth::user()->email;
        $user = $this->cek_user($email);

        $list_pendaftar = DB::table('fakultas')
                        ->join('pmb_pendaftar','fakultas.id_fakultas','=','pmb_pendaftar.id_fakultas')
                        ->get();
        
        $total = DB::table('pmb_pendaftar')->count();
        $belum = DB::table('pmb_pendaftar')->where('status_pembayaran_registrasi','BELUM DI KONFIRMASI')->count();
        $sudah = DB::table('pmb_pendaftar')->where('status_pembayaran_registrasi','SUDAH DI KONFIRMASI')->count();                 

        return view('dashboard.index', compact('user','list_pendaftar','total','belum','sudah'));
    }

    public function cek_user($email){
        $email = Auth::user()->email;
        $data_user = DB::table('roles')
                    ->select('roles.name')
                    ->join('role_user','roles.id','=','role_user.role_id')
                    ->join('users','role_user.user_id','=','users.id')
                    ->where('users.email',$email)
                    ->first();
                    
        return $data_user;            
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
