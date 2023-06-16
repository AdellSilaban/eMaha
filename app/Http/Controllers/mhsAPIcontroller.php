<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;

class mhsAPIcontroller extends Controller
{
    public function read(){
        $mhs = Mahasiswa::all();
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil tampil',
            'data' => $mhs
        ], 200);
    }

    public function create(Request $_request){
        $mhs = Mahasiswa::create([
        'nim' => $_request->nim,
        'nama' => $_request->nama,
        'gender' => $_request->gender,
        'prodi' => $_request->prodi,
        'minat' => $_request->minat,

    ]);
    if($mhs){
        return response()->json([
          'success' =>true,
          'message' =>'data  berhasil ditambahkan'   
        ],200);
    }
    else{
        if($mhs){
            return response()->json([
              'success' =>false,
              'message' =>'data  gagal ditambahkan'   
            ],400);
        }   
    }
    }

    public function update($id, Request $request){
        $mhs = Mahasiswa::find($id)->update([
        'nim' => $request->nim,
        'nama' => $request->nama,
        'gender' => $request->gender,
        'prodi' => $request->prodi,
        'minat' => $request->minat,

    ]);
    if($mhs){
        return response()->json([
          'success' =>true,
          'message' =>'data  berhasil diedit'   
        ],200);
    }
    else{
        if($mhs){
            return response()->json([
              'success' =>false,
              'message' =>'data  gagal diedit'   
            ],200);
        }   
    }
    }

    public function delete($id)
    {
        $mhs = Mahasiswa::whereId($id)->delete();

        if($mhs)
        {
        return response()->json([
            'success'=>true,
            'message'=>'Data Berhasil di Hapus'
        ], 200);
    }
    else
    {
        return response()->json([
        'success'=>false,
        'message'=>'Data Gagal di Hapus'
        ], 401);
    }
    }
}
