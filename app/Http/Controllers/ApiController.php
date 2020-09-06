<?php

namespace App\Http\Controllers;

use App\kelas;
use App\prodi;
use App\strata;
use App\fakultas;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function editnamafakultas(Request $req,$id_fakultas){
        $id = request()->get('pk');
        $name = request()->get('name');
        $value = request()->get('value');
        $edit = fakultas::findOrFail($id_fakultas);
        $edit->update([$name => $value]);
        // dd($edit);
    }

    public function editidfakultas(Request $req,$id_fakultas){
        $id = request()->get('pk');
        $name = request()->get('name');
        $value = request()->get('value');
        $edit = fakultas::findOrFail($id_fakultas);
        $edit->update([$name => $value]);
        // dd($edit);
    }

    public function editnamaprodi(Request $req,$id_prodi){
        $id = request()->get('pk');
        $name = request()->get('name');
        $value = request()->get('value');
        $edit = prodi::findOrFail($id_prodi);
        $edit->update([$name => $value]);
        // dd($_edit);
    }

    public function editidprodi(Request $req,$id_prodi){
        $id = request()->get('pk');
        $name = request()->get('name');
        $value = request()->get('value');
        $edit = prodi::findOrFail($id_prodi);
        $edit->update([$name => $value]);
        // dd($edit);
    }

    public function editidstrata(Request $req,$id_strata){
        $id = request()->get('pk');
        $name = request()->get('name');
        $value = request()->get('value');
        $edit = strata::findOrFail($id_strata);
        $edit->update([$name => $value]);
        // dd($edit);

    }

    public function editjenisstrata(Request $req,$id_strata){
        $id = request()->get('pk');
        $name = request()->get('name');
        $value = request()->get('value');
        $edit = strata::findOrFail($id_strata);
        $edit->update([$name => $value]);
        // dd($edit);
    }

    public function editidkelas(Request $req,$id_kelas){
        $id = request()->get('pk');
        $name = request()->get('name');
        $value = request()->get('value');
        $edit = kelas::findOrFail($id_kelas);
        $edit->update([$name => $value]);
        // dd($edit);
    }

    public function editjeniskelas(Request $req,$id_kelas){
        $id = request()->get('pk');
        $name = request()->get('name');
        $value = request()->get('value');
        $edit = kelas::findOrFail($id_kelas);
        $edit->update([$name => $value]);
        // dd($edit);
    }


}
