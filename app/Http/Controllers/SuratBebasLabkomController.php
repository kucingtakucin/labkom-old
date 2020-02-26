<?php

namespace App\Http\Controllers;

use App\Models\MahasiswaModel;
use Illuminate\Http\Request;
use App\Models\SuratBebasLabkomModel;
use Throwable;

class SuratBebasLabkomController extends Controller{

    public function index(){
        $Data = SuratBebasLabkomModel::select(['*'])
            ->join('mahasiswa_models','surat_bebas_labkom_models.id_mahasiswa','mahasiswa_models.id_mahasiswa')
            ->join('program_studi_models','mahasiswa_models.id_prodi','program_studi_models.id_prodi')
            ->join('angkatan_models','mahasiswa_models.id_angkatan_mahasiswa','angkatan_models.id_angkatan')
            ->get();
        $context = array(
            'Surat' => $Data,
            'i' => 1
        );
        return view('SuratBebasLabkom.SuratBebasLabkom', $context);
    }

    public function create(){
        $Mahasiswa = MahasiswaModel::all(['*']);
        $context = array(
            'Mahasiswa' => $Mahasiswa
        );
        return view('SuratBebasLabkom.Create', $context);
    }

    public function store(Request $request){
        $SuratBebasLabkom = new SuratBebasLabkomModel();
        $SuratBebasLabkom->id_mahasiswa = $request->id_mahasiswa;
        $SuratBebasLabkom->hari = $request->hari;
        $SuratBebasLabkom->tanggal = $request->tanggal;
        $SuratBebasLabkom->keperluan = $request->keperluan;
        try {
            $SuratBebasLabkom->saveOrFail();
        } catch (Throwable $e) {
            dd($SuratBebasLabkom, $e);
        }

        return redirect()->route('SuratBebasLabkom.index');
    }

    public function show($id){
        $SuratBebasLabkom = SuratBebasLabkomModel::select(['*'])
            ->join('mahasiswa_models','surat_bebas_labkom_models.id_mahasiswa','mahasiswa_models.id_mahasiswa')
            ->join('program_studi_models','mahasiswa_models.id_prodi','program_studi_models.id_prodi')
            ->join('angkatan_models','mahasiswa_models.id_angkatan_mahasiswa','angkatan_models.id_angkatan')
            ->where('id', $id)
            ->first();
        $context = array(
            'Surat' => $SuratBebasLabkom,
        );
        return view('SuratBebasLabkom.View', $context);
    }

    public function edit($id){
        $SuratBebasLabkom = SuratBebasLabkomModel::select(['*'])
            ->join('mahasiswa_models','surat_bebas_labkom_models.id_mahasiswa','mahasiswa_models.id_mahasiswa')
            ->where('id', $id)
            ->first();
        $Mahasiswa = MahasiswaModel::all(['*']);
        if (!$SuratBebasLabkom): abort(404); endif;
        $context = array(
            'Surat' => $SuratBebasLabkom,
            'Mahasiswa' => $Mahasiswa
        );
        return view('SuratBebasLabkom.Edit', $context);
    }

    public function update(Request $request, $id){
        $SuratBebasLabkom = SuratBebasLabkomModel::find($id);
        $SuratBebasLabkom->id_mahasiswa = $request->id_mahasiswa;
        $SuratBebasLabkom->hari = $request->hari;
        $SuratBebasLabkom->tanggal = $request->tanggal;
        $SuratBebasLabkom->keperluan = $request->keperluan;
        try {
            $SuratBebasLabkom->update();
        } catch (Throwable $e) {
            dd($SuratBebasLabkom, $e);
        }

        return redirect()->route('SuratBebasLabkom.index');
    }

    public function destroy($id){
        $SuratBebasLabkom = SuratBebasLabkomModel::find($id);
        if (!$SuratBebasLabkom): abort(404); endif;
        try {
            $SuratBebasLabkom->delete();
        } catch (Throwable $e) {
            dd($SuratBebasLabkom, $e);
        }

        return redirect()->route('SuratBebasLabkom.index');
    }
}
