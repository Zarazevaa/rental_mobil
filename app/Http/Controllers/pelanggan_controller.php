<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use Auth;
use App\pelanggan_model;

class pelanggan_controller extends Controller
{
    public function index($id)
    {
        if(Auth::user()->level=="admin"){
            $dt_pelanggan=pelanggan_model::get();
            return response()->json($dt_pelanggan);

    }else{
        return response()->json(['status'=>'anda bukan admin']);
    }
    }
    public function store(Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'nama_pelanggan'=>'required',
            'alamat'=>'required',
            'telp'=>'required',
            'no_ktp'=>'required',
            'foto'=>'required',
        ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $simpan=pelanggan_model::create([
            'nama_pelanggan'=>$req->nama_pelanggan,
            'alamat'=>$req->alamat,
            'telp'=>$req->telp,
            'no_ktp'=>$req->no_ktp,
            'foto'=>$req->foto,
        ]);
        if($simpan){
            return Response()->json(['status'=>1, 'message'=>"Data Berhasil Ditambahkan!"]);
        } else{
            return Response()->json(['status'=>0]);
        }
    }
    public function tampil_pelanggan()
    {
        $data_pelanggan=pelanggan_model::count();
        $data_pelanggan1=pelanggan_model::all();
        return Response()->json(['count'=> $data_pelanggan, 'pelanggan'=> $data_pelanggan1, 'status'=>1]);
    }

    public function update($id,Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'nama_pelanggan'=>'required',
            'alamat'=>'required',
            'telp'=>'required',
            'no_ktp'=>'required',
            'foto'=>'required',
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $ubah=pelanggan_model::where('id_pelanggan',$id)->update([
            'nama_pelanggan'=>$req->nama_pelanggan,
            'alamat'=>$req->alamat,
            'telp'=>$req->telp,
            'no_ktp'=>$req->no_ktp,
            'foto'=>$req->foto,
        ]);
        if($ubah){
            return Response()->json(['status'=>1, 'message'=>"Data Berhasil Diubah!"]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }
    public function destroy($id)
    {
        $hapus=pelanggan_model::where('id_pelanggan',$id)->delete();
        if($hapus){
            return Response()->json(['status'=>1, 'message'=>"Data Berhasil Dihapus!"]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }
}
