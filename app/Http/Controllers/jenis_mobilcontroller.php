<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use Auth;
use App\jenis_mobil_model;

class jenis_mobilcontroller extends Controller
{
    public function index($id)
    {
        if(Auth::user()->level=="admin"){
            $dt_jm=jenis_mobil_model::get();
            return response()->json($dt_jm);

    }else{
        return response()->json(['status'=>'anda bukan admin']);
    }
    }
    public function store(Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'nama_jenis'=>'required',
        ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $simpan=jenis_mobil_model::create([
            'nama_jenis'=>$req->nama_jenis,
        ]);
        if($simpan){
            return Response()->json(['status'=>1, 'message'=>"Data Berhasil Ditambahkan!"]);
        } else{
            return Response()->json(['status'=>0]);
        }
    }
    public function tampil_jm()
    {
        $data_jm=jenis_mobil_model::count();
        $data_jm1=jenis_mobil_model::all();
        return Response()->json(['count'=> $data_jm, 'jm'=> $data_jm1, 'status'=>1]);
    }

    public function update($id,Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'nama_jenis'=>'required',
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $ubah=jenis_mobil_model::where('id_jm',$id)->update([
            'nama_jenis'=>$req->nama_jenis,
        ]);
        if($ubah){
            return Response()->json(['status'=>1, 'message'=>"Data Berhasil Diubah!"]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }
    public function destroy($id)
    {
        $hapus=jenis_mobil_model::where('id_jm',$id)->delete();
        if($hapus){
            return Response()->json(['status'=>1, 'message'=>"Data Berhasil Dihapus!"]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }
}
