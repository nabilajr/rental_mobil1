<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Modeldetail_transaksi;
use DB;
use Auth;
use JWTAuth;

class detail_transaksi extends Controller
{
    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), 
        [
            'id_transaksi' => 'required',
            'id_jenis' => 'required',
            'qty'=> 'required',
        ]);

        if($validator->fails()){
            return Response()->json($validator->errors());
        }
$jenis=DB::table('jenis_cuci')->where('id',$req->id_jenis)->first();
$subtotal=($req->qty * $jenis->harga_per_kg);
        $laundry = Modeldetail_transaksi::create([
            'id_transaksi' => $req->id_transaksi,
            'id_jenis' => $req->id_jenis,
            'qty'=> $req->qty,
            'subtotal'=> $subtotal,
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
            'id_transaksi' => 'required',
            'id_jenis' => 'required',
            'qty'=> 'required',
            'subtotal'=> 'required',
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $laundry=Modeldetail_transaksi::where('id',$id)->update([
            'id_transaksi' => $req->id_transaksi,
            'id_jenis' => $req->id_jenis,
            'qty'=> $req->qty,
            'subtotal'=> $req->subtotal,
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
        $laundry=Modeldetail_transaksi::where('id',$id)->delete();
        if($laundry){
            return Response()->json(['status'=>1,'message'=>'Data Anggota berhasil dihapus']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data Anggota tidak berhasil dihapus']);
        }
    }

    public function tampil_pinjam()
    {        
       $laundry=Modeldetail_transaksi::all();
        if($laundry){
            return Response()->json(['Data'=>$laundry,'status'=>1]);
        }
        else{
            return Response()->json(['status'=>0]);
        }
    }
    
}
