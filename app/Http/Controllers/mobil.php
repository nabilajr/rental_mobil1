<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Modelmobil;

class mobil extends Controller
{
    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), 
        [
            'nama_mobil' => 'required',
            'id_jenis_mobil' => 'required',
            'plat_nomer'=> 'required',
            'kondisi'=> 'required',
        ]);

        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $mobil = Modelmobil::create([
            'nama_mobil' => $req->nama_mobil,
            'id_jenis_mobil' => $req->id_jenis_mobil,
            'plat_nomer'=> $req->plat_nomer,
            'kondisi'=> $req->kondisi,

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
            'nama_mobil' => 'required',
            'id_jenis_mobil' => 'required',
            'plat_nomer'=> 'required',
            'kondisi'=> 'required',
          
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $mobil=Modelmobil::where('id_penyewa',$id)->update([
            'nama_mobil' => $req->nama_mobil,
            'id_jenis_mobil' => $req->id_jenis_mobil,
            'plat_nomer'=> $req->plat_nomer,
            'kondisi'=> $req->kondisi,
      
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
        $mobil=Modelmobil::where('id_penyewa',$id)->delete();
        if($mobil){
            return Response()->json(['status'=>1,'message'=>'Data Anggota berhasil dihapus']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data Anggota tidak berhasil dihapus']);
        }
    }
    public function tampil()
    {
        $mobil=Modelmobil::all();
        if($mobil){
            return Response()->json(['Data'=>$mobil,'status'=>1]);
        }
        else{
            return Response()->json(['status'=>0]);
        }
    }
}
