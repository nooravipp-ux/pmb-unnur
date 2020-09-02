<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pmb_fakultas;

class ApiController extends Controller
{
    public function editnamafakultas(Request $req,$id_fakultas){
        $id = request()->get('pk');
        $name = request()->get('name');
        $value = request()->get('value');
        $edit = pmb_fakultas::findOrFail($id_fakultas);
        $edit->update([$name => $value]);
        // dd($edit);
    }
}
