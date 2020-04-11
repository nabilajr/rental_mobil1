<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modeladmin extends Model
{
    protected $table="admin";
    protected $primarykey="id_admin";
    protected $fillable = [
        'nama_admin', 'username','password', 'role', 'alamat',
     ];
    public $timestamps=false;
}
