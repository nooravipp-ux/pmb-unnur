<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PmbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pendaftaran_pmb()
    {
        $data_pmb = DB::table('pmb')->get();
        
        return view('setting_pmb.pendaftaran_pmb', compact('data_pmb'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function simpan_data_pmb(Request $request)
    {   
        DB::table('pmb')->insert([
            ['jalur_masuk' => $request->jalur_masuk, 'tahun' => $request->tahun_masuk, 'gelombang' => $request->gelombang, 'start_date' => $request->start_date,'finish_date' => $request->finish_date]
        ]);

        return redirect('pengaturan/pendaftaran-pmb')->with('sukses','data berhasil di simpan');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
