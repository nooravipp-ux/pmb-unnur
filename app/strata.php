<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class strata extends Model
{
    protected $guarded = [];
    protected $table = "strata";
    protected $primaryKey = 'id_strata';
    public $timestamps = false;
}
