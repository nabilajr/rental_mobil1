<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modeljenis_mobil extends Model
{
    protected $table="jenis_mobil";
    protected $primarykey="id_jenis";
    protected $fillable = [
        'jenis_mobil',
     ];
    public $timestamps=false;
}
