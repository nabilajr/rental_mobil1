<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelpenyewa extends Model
{
    protected $table="pelanggan";
    protected $primarykey="id";
         protected $fillable = [
        'nama', 'alamat', 'telp', 
     ];
    public $timestamps=false;
}
