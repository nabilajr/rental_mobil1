<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Modeltransaksi;
use App\Modeljenis_cuci;
use App\Modeltpelanggan;
use App\Modelpetugas;
use Auth;
use DB;

class transaksi extends Controller
{
public function store(Request $req)
    {
        $validator = Validator::make($req->all(), 
        [
            'id_pelanggan' => 'required',
            'id_petugas' => 'required',
            'tgl_transaksi'=> 'required',
            'tgl_selesai'=> 'required',
        ]);

        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $laundry = Modeltransaksi::create([
            'id_pelanggan' => $req->id_pelanggan,
            'id_petugas' => $req->id_petugas,
            'tgl_transaksi'=> $req->tgl_transaksi,
            'tgl_selesai'=> $req->tgl_selesai,
        ]);
        if($laundry){
            return Response()->json(['status'=>1,'message'=>'Data Anggota berhasil ditambahkan!']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data Anggota tidak berhasil ditambahkan!']);
        }
    
    }

     public function tampil_transaksi($tgl1,$tgl2){

        $trans=DB::table('transaksi')
            ->join('pelanggan','pelanggan.id','transaksi.id_pelanggan')
            ->join('petugas','petugas.id','transaksi.id_petugas') 
            ->where('tgl_transaksi','>=', $tgl1)
            ->where('tgl_transaksi','<=', $tgl2)
            ->get();

        $datatrans=array(); $no=0;
        foreach($trans as $t){
            $datatrans [$no]['tgl']=$t->tgl_transaksi;
            $datatrans [$no]['nama_pelanggan']= $t ->nama_pelanggan;
            $datatrans [$no]['alamat']=$t->alamat;
            $datatrans [$no]['telepon']=$t ->telp;
            $datatrans [$no]['tgl_selesai']=$t ->tgl_selasai;

            $grand=DB::table('detail_transaksi') 
                ->where('id_transaksi', $t->id)-> groupBy('id_transaksi')
                ->select(DB::raw('sum(subtotal) as grandtotal')) -> first();

            $datatrans [$no]['grandtotal']=$grand->grandtotal;
            $detail=DB::table('detail_transaksi')
                ->join('jenis_cuci','jenis_cuci.id','detail_transaksi.id_jenis')
                ->where('id_transaksi', $t->id)->get();
            $datatrans [$no]['detail']=$detail;
        }
        return Response()->json($datatrans);
    
        }

    public function update($id, Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'id_pelanggan' => 'required',
            'id_petugas' => 'required',
            'tgl_transaksi'=> 'required',
            'tgl_selesai'=> 'required',
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $laundry=Modeltransaksi::where('id',$id)->update([
            'id_pelanggan' => $req->id_pelanggan,
            'id_petugas' => $req->id_petugas,
            'tgl_transaksi'=> $req->tgl_transaksi,
            'tgl_selesai'=> $req->tgl_selesai,
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
        $laundry=Modeltransaksi::where('id',$id)->delete();
        if($laundry){
            return Response()->json(['status'=>1,'message'=>'Data Anggota berhasil dihapus']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data Anggota tidak berhasil dihapus']);
        }
    }
}