<?php

namespace App\Http\Controllers;

use App\Models\DosenModel;
use App\Models\MahasiswaModel;
use Illuminate\Http\Request;
use App\Models\PeminjamanStudioModel;
use Throwable;

class PeminjamanStudioController extends Controller{

    public function index(){
        $Data = PeminjamanStudioModel::select(['*'])
            ->join('mahasiswa_models','peminjaman_studio_models.id_mahasiswa','mahasiswa_models.id_mahasiswa')
            ->join('program_studi_models','mahasiswa_models.id_prodi','program_studi_models.id_prodi')
            ->join('angkatan_models','mahasiswa_models.id_angkatan_mahasiswa','angkatan_models.id_angkatan')
            ->join('dosen_models','peminjaman_studio_models.id_dosen','dosen_models.id_dosen')
            ->get();
        $context = array(
            'PeminjamanStudio' => $Data,
            'i' => 1
        );
        return view('PeminjamanStudio.PeminjamanStudio', $context);
    }

    public function create(){
        $Peminjam = MahasiswaModel::all(['*']);
        $Dosen = DosenModel::all(['*']);
        $context = array(
            'Peminjam' => $Peminjam,
            'Dosen' => $Dosen
        );
        return view('PeminjamanStudio.Create', $context);
    }


    public function store(Request $request){
        $PeminjamanStudio = new PeminjamanStudioModel();
        $PeminjamanStudio->id_mahasiswa = $request->id_mahasiswa;
        $PeminjamanStudio->hari = $request->hari;
        $PeminjamanStudio->tanggal = $request->tanggal;
        $PeminjamanStudio->waktu = $request->waktu;
        $PeminjamanStudio->id_dosen = $request->id_dosen;
        $PeminjamanStudio->keperluan = $request->keperluan;
        try {
            $PeminjamanStudio->saveOrFail();
        } catch (Throwable $e) {
            dd($PeminjamanStudio, $e);
        }

        return redirect()->route('PeminjamanStudio.index');
    }

    public function show($id){
        $PeminjamanStudio = PeminjamanStudioModel::select(['*'])
            ->join('mahasiswa_models','peminjaman_studio_models.id_mahasiswa','mahasiswa_models.id_mahasiswa')
            ->join('program_studi_models','mahasiswa_models.id_prodi','program_studi_models.id_prodi')
            ->join('angkatan_models','mahasiswa_models.id_angkatan_mahasiswa','angkatan_models.id_angkatan')
            ->join('dosen_models','peminjaman_studio_models.id_dosen','dosen_models.id_dosen')
            ->where('id',$id)
            ->first();
        $context = array(
            'PeminjamanStudio' => $PeminjamanStudio
        );
        return view('PeminjamanStudio.View', $context);
    }

    public function edit($id){
        $PeminjamanStudio = PeminjamanStudioModel::select(['*'])
            ->join('mahasiswa_models','peminjaman_studio_models.id_mahasiswa','mahasiswa_models.id_mahasiswa')
            ->join('program_studi_models','mahasiswa_models.id_prodi','program_studi_models.id_prodi')
            ->join('angkatan_models','mahasiswa_models.id_angkatan_mahasiswa','angkatan_models.id_angkatan')
            ->join('dosen_models','peminjaman_studio_models.id_dosen','dosen_models.id_dosen')
            ->where('id',$id)
            ->first();
        $Peminjam = MahasiswaModel::all(['*']);
        $Dosen = DosenModel::all(['*']);
        if (!$PeminjamanStudio): abort(404); endif;
        $context = array(
            'PeminjamanStudio' => $PeminjamanStudio,
            'Peminjam' => $Peminjam,
            'Dosen' => $Dosen
        );
        return view('PeminjamanStudio.Edit', $context);
    }

    public function update(Request $request, $id){
        $PeminjamanStudio = PeminjamanStudioModel::find($id);
        $PeminjamanStudio->id_mahasiswa = $request->id_mahasiswa;
        $PeminjamanStudio->hari = $request->hari;
        $PeminjamanStudio->tanggal = $request->tanggal;
        $PeminjamanStudio->waktu = $request->waktu;
        $PeminjamanStudio->id_dosen = $request->id_dosen;
        $PeminjamanStudio->keperluan = $request->keperluan;
        try {
            $PeminjamanStudio->update();
        } catch (\Throwable $e) {
            dd($PeminjamanStudio, $e);
        }

        return redirect()->route('PeminjamanStudio.index');
    }

    public function destroy($id){
        $PeminjamanStudio = PeminjamanStudioModel::find($id);
        if (!$PeminjamanStudio): abort(404); endif;
        try {
            $PeminjamanStudio->delete();
        } catch (Throwable $e) {
            dd($PeminjamanStudio, $e);
        }

        return redirect()->route('PeminjamanStudio.index');
    }
}
