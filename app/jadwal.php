<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class jadwal extends Model
{
    //
    protected $guarded = [];
    protected $table = 'pmb_jadwal_ujian';
    protected $primaryKey = 'id_jadwal_ujian';
    public $timestamps = false;
}
