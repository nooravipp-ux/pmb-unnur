<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\fakultas;
use App\prodi;

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

    public function editnamaprodi(Request $req,$id_prodi){
        $id = request()->get('pk');
        $name = request()->get('name');
        $value = request()->get('value');
        $edit = prodi::findOrFail($id_prodi);
        $edit->update([$name => $value]);
        // dd($_edit);
    }
}
