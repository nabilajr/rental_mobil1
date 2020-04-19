<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modeltransaksi extends Model
{
     protected $table="transaksi";
    protected $primarykey="id_transaksi";
    protected $fillable = [
        'id_mobil', 'id_penyewa', 'tgl_admin',
     ];
    public $timestamps=false;
}
