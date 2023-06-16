<?php

namespace App\Http\Controllers;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function read(){
        $task = Task::all();
        return Response()->json([
            'success' => true,
            'message' => 'Data Berhasil Ditampilkan',
            'data' => $task
        ], 200);
    }

    public function create(Request $request)
    {
        //$minat = implode(',', $request->get('minat'));
       $task = Task::create([
            'nama' => $request->nama,
            'judul_task' => $request->judul_task,
            'deskripsi_task' => $request->deskripsi_task
        ]);

        if ($task){
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Ditambahkan'
            ], 200);
        }
        else
        {
            return response()->json([
                'success' => false,
                'message' => 'Gagal Disimpan'
            ], 401);
        }
    }

    public function update($id, Request $request)
    {
        $task = Task::find($id)->update([
            'nama' => $request->nama,
            'judul_task' => $request->judul_task,
            'deskripsi_task' => $request->deskripsi_task
        ]);

        if ($task){
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Diubah'
            ], 200);
        }
        else
        {
            return response()->json([
                'success' => false,
                'message' => 'Gagal Diubah'
            ], 401);
        }
    }

    public function delete($id, Request $request)
    {
        $task = Task::find($id);
        $task->delete();

        if ($task){
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Dihapus'
            ], 200);
        }
        else
        {
            return response()->json([
                'success' => false,
                'message' => 'Gagal Dihapus'
            ], 401);
        }
    }
}