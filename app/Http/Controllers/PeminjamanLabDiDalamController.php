<?php

namespace App\Http\Controllers;

use App\Models\DosenModel;
use App\Models\LabModel;
use App\Models\MahasiswaModel;
use App\Models\MataKuliahModel;
use Illuminate\Http\Request;
use App\Models\PeminjamanLabDiDalamModel;
use Throwable;

class PeminjamanLabDiDalamController extends Controller{

    public function index(){
        $Data = PeminjamanLabDiDalamModel::select(['*'])
            ->join('mahasiswa_models','peminjaman_lab_di_dalam_models.id_mahasiswa','mahasiswa_models.id_mahasiswa')
            ->join('program_studi_models','mahasiswa_models.id_prodi','program_studi_models.id_prodi')
            ->join('lab_models','peminjaman_lab_di_dalam_models.id_lab','lab_models.id_lab')
            ->join('dosen_models','peminjaman_lab_di_dalam_models.id_dosen','dosen_models.id_dosen')
            ->join('mata_kuliah_models','peminjaman_lab_di_dalam_models.id_mata_kuliah','mata_kuliah_models.id_mata_kuliah')
            ->join('angkatan_models','mahasiswa_models.id_angkatan_mahasiswa','angkatan_models.id_angkatan')
            ->get();
//        dd($Data);
        $context = array(
            'PeminjamanLab' => $Data,
            'i' => 1
        );
//        dd($context);
        return view('PeminjamanLab.DiDalam.DiDalam', $context);
    }

    public function create(){
        $Peminjam = MahasiswaModel::all(['*']);
        $Dosen = DosenModel::all(['*']);
        $MataKuliah = MataKuliahModel::all(['*']);
        $Lab = LabModel::all(['*']);
        $context = array(
            'Peminjam' => $Peminjam,
            'Dosen'=> $Dosen,
            'MataKuliah' => $MataKuliah,
            'Lab' => $Lab
        );

        return view('PeminjamanLab.DiDalam.Create', $context);
    }

    public function store(Request $request){
        $PeminjamanLab = new PeminjamanLabDiDalamModel();
        $PeminjamanLab->id_mahasiswa = $request->id_mahasiswa;
        $PeminjamanLab->hari = $request->hari;
        $PeminjamanLab->tanggal = $request->tanggal;
        $PeminjamanLab->id_lab = $request->id_lab;
        $PeminjamanLab->jam_pinjam = $request->jam_pinjam;
        $PeminjamanLab->jam_kembali = $request->jam_kembali;
        $PeminjamanLab->id_dosen = $request->id_dosen;
        $PeminjamanLab->id_mata_kuliah = $request->id_mata_kuliah;
        $PeminjamanLab->keperluan = $request->keperluan;
        try {
            $PeminjamanLab->saveOrFail();
        } catch (Throwable $e) {
            dd($PeminjamanLab, $e);
        }

        return redirect()->route('DiDalam.index');
    }

    public function show($id){
        $Data = PeminjamanLabDiDalamModel::select(['*'])
            ->join('mahasiswa_models','peminjaman_lab_di_dalam_models.id_mahasiswa','mahasiswa_models.id_mahasiswa')
            ->join('program_studi_models','mahasiswa_models.id_prodi','program_studi_models.id_prodi')
            ->join('lab_models','peminjaman_lab_di_dalam_models.id_lab','lab_models.id_lab')
            ->join('dosen_models','peminjaman_lab_di_dalam_models.id_dosen','dosen_models.id_dosen')
            ->join('mata_kuliah_models','peminjaman_lab_di_dalam_models.id_mata_kuliah','mata_kuliah_models.id_mata_kuliah')
            ->join('angkatan_models','mahasiswa_models.id_angkatan_mahasiswa','angkatan_models.id_angkatan')
            ->where('id', $id)
            ->first();
        $context = array(
            'PeminjamanLab' => $Data,
        );

        return view('PeminjamanLab.DiDalam.View', $context);
    }

    public function edit($id){
        $PeminjamanLab = PeminjamanLabDiDalamModel::select(['*'])
            ->join('mahasiswa_models','peminjaman_lab_di_dalam_models.id_mahasiswa','mahasiswa_models.id_mahasiswa')
            ->join('program_studi_models','mahasiswa_models.id_prodi','program_studi_models.id_prodi')
            ->join('lab_models','peminjaman_lab_di_dalam_models.id_lab','lab_models.id_lab')
            ->join('dosen_models','peminjaman_lab_di_dalam_models.id_dosen','dosen_models.id_dosen')
            ->join('mata_kuliah_models','peminjaman_lab_di_dalam_models.id_mata_kuliah','mata_kuliah_models.id_mata_kuliah')
            ->join('angkatan_models','mahasiswa_models.id_angkatan_mahasiswa','angkatan_models.id_angkatan')
            ->where('id', $id)
            ->first();
        $Peminjam = MahasiswaModel::all(['*']);
        $Dosen = DosenModel::all(['*']);
        $MataKuliah = MataKuliahModel::all(['*']);
        $Lab = LabModel::all(['*']);
        if (!$PeminjamanLab): abort(404); endif;
        $context = array(
            'PeminjamanLab' => $PeminjamanLab,
            'Peminjam' => $Peminjam,
            'Lab' => $Lab,
            'Dosen' => $Dosen,
            'MataKuliah' => $MataKuliah
        );
        return view('PeminjamanLab.DiDalam.Edit', $context);
    }

    public function update(Request $request, $id){
        $PeminjamanLab = PeminjamanLabDiDalamModel::find($id);
        $PeminjamanLab->id_mahasiswa = $request->id_mahasiswa;
        $PeminjamanLab->hari = $request->hari;
        $PeminjamanLab->tanggal = $request->tanggal;
        $PeminjamanLab->id_lab = $request->id_lab;
        $PeminjamanLab->jam_pinjam = $request->jam_pinjam;
        $PeminjamanLab->jam_kembali = $request->jam_kembali;
        $PeminjamanLab->id_dosen = $request->id_dosen;
        $PeminjamanLab->id_mata_kuliah = $request->id_mata_kuliah;
        $PeminjamanLab->keperluan = $request->keperluan;
        try {
            $PeminjamanLab->update();
        } catch (Throwable $e) {
            dd($PeminjamanLab, $e);
        }

        return redirect()->route('DiDalam.index');
    }

    public function destroy($id){
        $PeminjamanLab = PeminjamanLabDiDalamModel::find($id);
        if (!$PeminjamanLab): abort(404); endif;
        try {
            $PeminjamanLab->delete();
        } catch (Throwable $e) {
            dd($PeminjamanLab, $e);
        }

        return redirect()->route('DiDalam.index');
    }
}
