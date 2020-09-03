<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    protected $guarded = [];
    protected $table = "kelas";
    protected $primaryKey = 'id_kelas';
    public $timestamps = false;
}
