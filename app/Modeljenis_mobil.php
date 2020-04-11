<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modeljenis_mobil extends Model
{
    protected $table="jenis_cuci";
    protected $primarykey="id";
    protected $fillable = [
        'nama_jenis', 'harga_per_kg',
     ];
    public $timestamps=false;
}
