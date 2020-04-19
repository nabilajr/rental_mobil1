<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Modeljenis_mobil;

class jenis_mobil extends Controller
{
    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), 
        [
            'jenis_mobil' => 'required',
    
        ]);

        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $mobil = Modeljenis_mobil::create([
            'jenis_mobil' => $req->jenis_mobil,
            
        ]);
        if($mobil){
            return Response()->json(['status'=>1,'message'=>'Data Anggota berhasil ditambahkan!']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data Anggota tidak berhasil ditambahkan!']);
        }
    }

    public function update($id, Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'jenis_mobil' => 'required',
           
            
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $mobil=Modeljenis_mobil::where('id',$id)->update([
            'jenis_mobil' => $req->jenis_mobil,

        ]);
        if($mobil){
            return Response()->json(['status'=>1,'message'=>'Data Anggota berhasil diubah']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data Anggota tidak berhasil diubah']);
        }
    }

    public function delete($id)
    {
        $mobil=Modeljenis_mobil::where('id',$id)->delete();
        if($mobil){
            return Response()->json(['status'=>1,'message'=>'Data Anggota berhasil dihapus']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data Anggota tidak berhasil dihapus']);
        }
    }
    public function tampil()
    {
        $mobil=Modeljenis_mobil::all();
        if($mobil){
            return Response()->json(['Data'=>$mobil,'status'=>1]);
        }
        else{
            return Response()->json(['status'=>0]);
        }
    }
}
