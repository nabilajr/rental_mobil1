<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelmobil extends Model
{
    protected $table="mobil";
    protected $primarykey="id_mobil";
    protected $fillable = [
        'nama_mobil', 'id_jenis_mobil', 'plat_nomer', 'kondisi',
     ];
    public $timestamps=false;
}
