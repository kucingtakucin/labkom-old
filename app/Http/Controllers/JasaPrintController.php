<?php

namespace App\Http\Controllers;

use App\Models\JasaPrintModel;
use App\Models\PrintModel;
use Illuminate\Http\Request;
use Throwable;

class JasaPrintController extends Controller{

    public function index(){
        $JasaPrint = JasaPrintModel::select(['*'])
            ->join('print_models','jasa_print_models.id_keterangan_print','print_models.id_print')
            ->get();
        $context = array(
            'JasaPrint' => $JasaPrint,
            'i' => 1
        );

        return view('JasaPrint.JasaPrint', $context);
    }

    public function create(){
        $Print = PrintModel::all(['*']);
        $context = array(
            'Print' => $Print
        );
        return view('JasaPrint.Create', $context);
    }

    public function store(Request $request){
        $JasaPrint = new JasaPrintModel();
        $JasaPrint->id_keterangan_print = $request->id_keterangan_print;
        $JasaPrint->hari = $request->hari;
        $JasaPrint->tanggal = $request->tanggal;
        $JasaPrint->jumlah = $request->jumlah;
        $JasaPrint->lainlain = $request->lainlain;
        try {
            $JasaPrint->saveOrFail();
        } catch (Throwable $e) {
            dd($JasaPrint, $e);
        }

        return redirect()->route('JasaPrint.index');
    }

    public function show($id){
        $JasaPrint = JasaPrintModel::select(['*'])
            ->join('print_models','jasa_print_models.id_keterangan_print','print_models.id_print')
            ->where('id',$id)
            ->first();
        $context = array(
            'JasaPrint' => $JasaPrint,
        );
        return view('JasaPrint.View', $context);
    }

    public function edit($id){
        $JasaPrint = JasaPrintModel::select(['*'])
            ->join('print_models','jasa_print_models.id_keterangan_print','print_models.id_print')
            ->where('id',$id)
            ->first();
        $Print = PrintModel::all(['*']);
        if (!$JasaPrint): abort(404); endif;
        $context = array(
            'JasaPrint' => $JasaPrint,
            'Print' => $Print
        );
        return view('JasaPrint.Edit', $context);
    }

    public function update(Request $request, $id){
        $JasaPrint = JasaPrintModel::find($id);
        $JasaPrint->id_keterangan_print = $request->id_keterangan_print;
        $JasaPrint->hari = $request->hari;
        $JasaPrint->tanggal = $request->tanggal;
        $JasaPrint->jumlah = $request->jumlah;
        $JasaPrint->lainlain = $request->lainlain;
        try {
            $JasaPrint->update();
        } catch (Throwable $e) {
            dd($JasaPrint, $e);
        }

        return redirect()->route('JasaPrint.index');
    }

    public function destroy($id){
        $JasaPrint = JasaPrintModel::find($id);
        if (!$JasaPrint): abort(404); endif;
        try {
            $JasaPrint->delete();
        } catch (Throwable $e) {
            dd($JasaPrint, $e);
        }

        return redirect()->route('JasaPrint.index');
    }
}
