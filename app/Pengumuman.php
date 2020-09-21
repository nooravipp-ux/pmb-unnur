<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    protected $guarded = [];
    protected $table = 'pmb_pengumuman';
    public $timestamps = false;
}
