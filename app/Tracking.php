<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    protected $table = 'st_asuransi';
    protected $primaryKey = 'id_asuransi';
    public $incrementing = false;
    protected $fillable = [
    	'id_asuransi',
        'deskripsi',
        'entry_user'
    ];
}
