<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelpenyewa extends Model
{
    protected $table="penyewa";
    protected $primarykey="id_penyewa";
         protected $fillable = [
        'nama_penyewa', 'username', 'password', 'no_kotp', 'alamat',
     ];
    public $timestamps=false;
}
