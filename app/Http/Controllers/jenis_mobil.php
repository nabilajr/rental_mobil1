<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Modeljenis_cuci;

class jenis_cuci extends Controller
{
    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), 
        [
            'nama_jenis' => 'required',
            'harga_per_kg' => 'required',
        ]);

        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $laundry = Modeljenis_cuci::create([
            'nama_jenis' => $req->nama_jenis,
            'harga_per_kg' => $req->harga_per_kg,
            
        ]);
        if($laundry){
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
            'nama_jenis' => 'required',
            'harga_per_kg' => 'required',
            
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $laundry=Modeljenis_cuci::where('id',$id)->update([
            'nama_jenis' => $req->nama_jenis,
            'harga_per_kg' => $req->harga_per_kg,
            'telp'=> $req->telp,
        ]);
        if($laundry){
            return Response()->json(['status'=>1,'message'=>'Data Anggota berhasil diubah']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data Anggota tidak berhasil diubah']);
        }
    }

    public function delete($id)
    {
        $laundry=Modeljenis_cuci::where('id',$id)->delete();
        if($laundry){
            return Response()->json(['status'=>1,'message'=>'Data Anggota berhasil dihapus']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data Anggota tidak berhasil dihapus']);
        }
    }
    public function tampil()
    {
        $laundry=Modeljenis_cuci::all();
        if($laundry){
            return Response()->json(['Data'=>$laundry,'status'=>1]);
        }
        else{
            return Response()->json(['status'=>0]);
        }
    }
}
