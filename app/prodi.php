<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prodi extends Model
{
     protected $guarded = [];
    protected $table = "prodi";
    protected $primaryKey = 'id_prodi';

    public $incrementing = false;
    public $timestamps = false;
}
