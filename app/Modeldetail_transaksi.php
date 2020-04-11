<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modeldetail_transaksi extends Model
{
     protected $table="detail_transaksi";
    protected $primarykey="id";
    protected $fillable = [
        'id_transaksi', 'id_jenis', 'qty', 'subtotal',
     ];
    public $timestamps=false;
}
