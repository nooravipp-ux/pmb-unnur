<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pmb_prodi extends Model
{
    protected $guarded = [];
    protected $table = "pmb_prodi";
    protected $primaryKey = 'id_prodi';

    public $incrementing = false;
    public $timestamps = false;

    public function pmb_fakultas()
    {
        return $this->belongsTo('App\pmb_fakultas');
    }
}
