<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fakultas extends Model
{
    protected $guarded = [];
    protected $table = "fakultas";
    protected $primaryKey = 'id_fakultas';

    public $incrementing = false;
    public $timestamps = false;
}
