<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trucking extends Model
{
    protected $table = 'trucking';
    protected $primaryKey = 'id_trucking';
    public $incrementing = true;
    
    protected $fillable = [
    	'no_jo', 'no_kendaraan', 'sopir',
    	'customer', 'tujuan_dari', 'tujuan_ke',
    	'no_container', 'status_d20', 'status_d40',
    	'jumlah_bop', 'tagihan', 'revenue',
    	'provit', 'ket', 'tanggal', 'entry_user'
    ];
}
