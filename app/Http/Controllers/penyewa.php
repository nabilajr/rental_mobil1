<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Modelpenyewa;

class penyewa extends Controller
{
    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), 
        [
            'nama_penyewa' => 'required',
            'username' => 'required',
            'password'=> 'required',
            'no_ktp'=> 'required',
            'alamat'=> 'required',
        ]);

        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $mobil = Modelpenyewa::create([
            'nama_penyewa' => $req->nama_penyewa,
            'username' => $req->username,
            'password'=> $req->password,
            'no_ktp'=> $req->no_ktp,
            'alamat'=> $req->alamat,
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
            'nama_penyewa' => 'required',
            'username' => 'required',
            'password'=> 'required',
            'no_ktp'=> 'required',
            'alamat'=> 'required',
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $mobil=Modelpenyewa::where('id_penyewa',$id)->update([
            'nama_penyewa' => $req->nama_penyewa,
            'username' => $req->username,
            'password'=> $req->password,
            'no_ktp'=> $req->no_ktp,
            'alamat'=> $req->alamat,
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
        $mobil=Modelpenyewa::where('id_penyewa',$id)->delete();
        if($mobil){
            return Response()->json(['status'=>1,'message'=>'Data Anggota berhasil dihapus']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data Anggota tidak berhasil dihapus']);
        }
    }
    public function tampil()
    {
        $mobil=Modelpenyewa::all();
        if($mobil){
            return Response()->json(['Data'=>$mobil,'status'=>1]);
        }
        else{
            return Response()->json(['status'=>0]);
        }
    }
}
