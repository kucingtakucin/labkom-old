<?php

namespace App\Http\Controllers;

use App\Models\DosenModel;
use Illuminate\Http\Request;
use Throwable;

class DosenController extends Controller{

    public function index(){
        $Dosen = DosenModel::all(['*']);
        $context = array(
            'Dosen' => $Dosen,
            'i' => 1
        );
        return view('Dosen.Dosen', $context);
    }

    public function create(){
        return view('Dosen.Create');
    }

    public function store(Request $request){
        $Dosen = new DosenModel();
        $Dosen->nama_dosen = $request->nama_dosen;
        try {
            $Dosen->saveOrFail();
        } catch (Throwable $e) {
            dd($Dosen, $e);
        }

        return redirect()->route('Dosen.index');
    }

    public function show($id){
        $Dosen = DosenModel::select(['*'])->where('id_dosen',$id)->first();
        $context = array(
            'Dosen' => $Dosen
        );
        return view('Dosen.View', $context);
    }

    public function edit($id){
        $Dosen = DosenModel::select(['*'])->where('id_dosen',$id)->first();
        if (!$Dosen): abort(404); endif;
        $context = array(
            'Dosen' => $Dosen
        );

        return view('Dosen.Edit', $context);
    }

    public function update(Request $request, $id){
        $Dosen = DosenModel::select(['*'])->where('id_dosen',$id);
        try {
            $Dosen->update([
                'nama_dosen' => $request->nama_dosen,
            ]);
        } catch (Throwable $e) {
            dd($Dosen, $e);
        }

        return redirect()->route('Dosen.index');
    }

    public function destroy($id){
        $Dosen = DosenModel::select(['*'])->where('id_dosen',$id);
        try {
            $Dosen->delete();
        } catch (Throwable $e) {
            dd($Dosen, $e);
        }

        return redirect()->route('Dosen.index');
    }
}
