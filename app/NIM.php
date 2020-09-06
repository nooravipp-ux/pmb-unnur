<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NIM extends Model
{
    protected $guarded =[];
    protected $primaryKey = 'id_NIM';
    protected $table = 'nim';
    public $incrementing = false;
    public $timestamps = false;
}
