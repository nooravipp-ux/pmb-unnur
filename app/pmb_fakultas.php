<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pmb_fakultas extends Model
{
    protected $guarded = [];
    protected $table = "pmb_fakultas";
    protected $primaryKey = 'id_fakultas';

    public $incrementing = false;
    public $timestamps = false;

    public function pmb_prodi()
    {
        return $this->hasMany('App\pmb_pmb_prodi');
    }
}
