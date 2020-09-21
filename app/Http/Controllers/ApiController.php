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
        $id = request()->get('pk');
        $name = request()->get('name');
        $value = request()->get('value');
        DB::table('fakultas')->where('id_fakultas',$id_fakultas)->update([$name => $value]);
        // $edit->update([$name => $value]);
        // dd($edit);
    }

    public function editidfakultas(Request $req,$id_fakultas){
        // dd($req->all());
        $id = request()->get('pk');
        $name = request()->get('name');
        $value = request()->get('value');
        DB::table('fakultas')->where('id_fakultas',$id_fakultas)->update([$name => $value]);
        // fakultas::Find($id_fakultas)->update([$name => $value]);
        // $edit->update([$name => $value]);
        // dd($edit);
    }

    public function editnamaprodi(Request $req,$id_prodi){
        $id = request()->get('pk');
        $name = request()->get('name');
        $value = request()->get('value');
        $edit = prodi::Find($id_prodi);
        $edit->update([$name => $value]);
        // dd($_edit);
    }

    public function editidprodi(Request $req,$id_prodi){
        $id = request()->get('pk');
        $name = request()->get('name');
        $value = request()->get('value');
        $edit = prodi::Find($id_prodi);
        $edit->update([$name => $value]);
        // dd($edit);
    }

    public function editidstrata(Request $req,$id_strata){
        $id = request()->get('pk');
        $name = request()->get('name');
        $value = request()->get('value');
        $edit = strata::Find($id_strata);
        $edit->update([$name => $value]);
        // dd($edit);

    }

    public function editjenisstrata(Request $req,$id_strata){
        $id = request()->get('pk');
        $name = request()->get('name');
        $value = request()->get('value');
        $edit = strata::Find($id_strata);
        $edit->update([$name => $value]);
        // dd($edit);
    }

    public function editidkelas(Request $req,$id_kelas){
        $id = request()->get('pk');
        $name = request()->get('name');
        $value = request()->get('value');
        $edit = kelas::Find($id_kelas);
        $edit->update([$name => $value]);
        // dd($edit);
    }

    public function editjeniskelas(Request $req,$id_kelas){
        $id = request()->get('pk');
        $name = request()->get('name');
        $value = request()->get('value');
        $edit = kelas::Find($id_kelas);
        $edit->update([$name => $value]);
        // dd($edit);
    }


}
