<?php

namespace App\Http\Controllers;

use App\Models\MataKuliahModel;
use Illuminate\Http\Request;
use Throwable;

class MataKuliahController extends Controller{

    public function index(){
        $MataKuliah = MataKuliahModel::all(['*']);
        $context = array(
            'MataKuliah' => $MataKuliah,
            'i' => 1
        );
        return view('MataKuliah.MataKuliah', $context);
    }

    public function create(){
        return view('MataKuliah.Create');
    }

    public function store(Request $request){
        $MataKuliah = new MataKuliahModel();
        $MataKuliah->nama_mata_kuliah = $request->nama_mata_kuliah;
        try {
            $MataKuliah->saveOrFail();
        } catch (Throwable $e) {
            dd($MataKuliah, $e);
        }

        return redirect()->route('MataKuliah.index');
    }

    public function show($id){
        $MataKuliah = MataKuliahModel::select(['*'])->where('id_mata_kuliah', $id)->first();
        $context = array(
            'MataKuliah' => $MataKuliah
        );
        return view('MataKuliah.View', $context);
    }

    public function edit($id){
        $MataKuliah = MataKuliahModel::select(['*'])->where('id_mata_kuliah', $id)->first();
        $context = array(
            'MataKuliah' => $MataKuliah
        );
        return view('MataKuliah.Edit', $context);
    }

    public function update(Request $request, $id){
        $MataKuliah = MataKuliahModel::select(['*'])->where('id_mata_kuliah', $id);
        try {
            $MataKuliah->update([
                'nama_mata_kuliah' => $request->nama_mata_kuliah,
            ]);
        } catch (Throwable $e) {
            dd($MataKuliah, $e);
        }

        return redirect()->route('MataKuliah.index');
    }

    public function destroy($id){
        $MataKuliah = MataKuliahModel::select(['*'])->where('id_mata_kuliah', $id);
        try {
            $MataKuliah->delete();
        } catch (Throwable $e) {
            dd($MataKuliah, $e);
        }

        return redirect()->route('MataKuliah.index');
    }
}
