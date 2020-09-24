<?php

namespace App\Http\Controllers;

use App\kelas;
use App\prodi;
use App\strata;
use App\fakultas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function editnamafakultas(Request $req,$id_fakultas){
        try{
            $id = request()->get('pk');
            $name = request()->get('name');
            $value = request()->get('value');
            fakultas::findOrFail($id_fakultas)->update([$name => $value]);
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage(), 400]);
        }
        return response()->json(['message' => 'Berhasil', 200]);
        // $edit->update([$name => $value]);
        // dd($edit);
    }

    public function editidfakultas(Request $req,$id_fakultas){
        // dd($req->all());
        try{
            $id = request()->get('pk');
            $name = request()->get('name');
            $value = request()->get('value');
            fakultas::findOrFail($id_fakultas)->update([$name => $value]);
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage(), 400]);
        }
        return response()->json(['message' => 'Berhasil', 200]);
    }

    public function editnamaprodi(Request $req,$id_prodi){
        try{
            $id = request()->get('pk');
            $name = request()->get('name');
            $value = request()->get('value');
            prodi::findOrFail($id_prodi)->update([$name => $value]);
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage(), 400]);
        }
        return response()->json(['message' => 'Berhasil', 200]);
        // dd($_edit);
    }

    public function editidprodi(Request $req,$id_prodi){
        try{
            $id = request()->get('pk');
            $name = request()->get('name');
            $value = request()->get('value');
            prodi::findOrFail($id_prodi)->update([$name => $value]);
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage(), 400]);
        }
        return response()->json(['message' => 'Berhasil', 200]);
        // dd($edit);
    }

    public function editidstrata(Request $req,$id_strata){
        try{
            $id = request()->get('pk');
            $name = request()->get('name');
            $value = request()->get('value');
            strata::findOrFail($id_strata)->update([$name => $value]);

        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage(), 400]);
        }
        return response()->json(['message' => 'Berhasil', 200]);
        // dd($edit);

    }

    public function editjenisstrata(Request $req,$id_strata){
        try{
            $id = request()->get('pk');
            $name = request()->get('name');
            $value = request()->get('value');
            strata::findOrFail($id_strata)->update([$name => $value]);

        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage(), 400]);
        }
        return response()->json(['message' => 'Berhasil', 200]);
        // dd($edit);
    }

    public function editidkelas(Request $req,$id_kelas){
        try{
            $id = request()->get('pk');
            $name = request()->get('name');
            $value = request()->get('value');
            kelas::findOrFail($id_kelas)->update([$name => $value]);

        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage(), 400]);
        }
        return response()->json(['message' => 'Berhasil', 200]);
        // dd($edit);
    }

    public function editjeniskelas(Request $req,$id_kelas){
        try{
            $id = request()->get('pk');
            $name = request()->get('name');
            $value = request()->get('value');
            kelas::findOrFail($id_kelas)->update([$name => $value]);

        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage(), 400]);
        }
        return response()->json(['message' => 'Berhasil', 200]);
        // dd($edit);
    }

    public function editbiayaregis(Request $req,$id_pmb_biaya_registrasi){
        try{
            $id = request()->get('pk');
            $name = request()->get('name');
            $value = request()->get('value');
            DB::table('pmb_biaya_registrasi')->where('id_pmb_biaya_registrasi',$id_pmb_biaya_registrasi)->update([$name => $value]);
        }catch(\Exception $e){
            return response()->json(['message' => $e->getMessage(), 400]);
        }
        return response()->json(['message' => 'Berhasil', 200]);
        // dd($edit);
    }

}
