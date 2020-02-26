<?php

namespace App\Http\Controllers;

use App\Models\AlatModel;
use App\Models\MahasiswaModel;
use Illuminate\Http\Request;
use App\Models\PeminjamanAlatModel;
use Throwable;

class PeminjamanAlatController extends Controller{

    public function index(){
        $PeminjamanAlat = PeminjamanAlatModel::select(['*'])
            ->join('alat_models','peminjaman_alat_models.id_alat','alat_models.id_alat')
            ->join('mahasiswa_models','peminjaman_alat_models.id_mahasiswa','mahasiswa_models.id_mahasiswa')
            ->join('program_studi_models','mahasiswa_models.id_prodi','program_studi_models.id_prodi')
            ->join('angkatan_models','mahasiswa_models.id_angkatan_mahasiswa','angkatan_models.id_angkatan')
            ->get();
//        dd($PeminjamanAlat);
        $context = array(
            'PeminjamanAlat' => $PeminjamanAlat,
            'i' => 1
        );
        return view('PeminjamanAlat.PeminjamanAlat', $context);
    }

    public function create(){
        $Alat = AlatModel::all(['*']);
        $Peminjam = MahasiswaModel::all(['*']);
        $context = array(
            'Alat' => $Alat,
            'Peminjam' => $Peminjam,
            'i' => 1
        );
        return view('PeminjamanAlat.Create', $context);
    }

    public function store(Request $request){
        $PeminjamanAlat = new PeminjamanAlatModel();
        $PeminjamanAlat->id_mahasiswa = $request->id_mahasiswa;
        $PeminjamanAlat->hari = $request->hari;
        $PeminjamanAlat->tanggal = $request->tanggal;
        $PeminjamanAlat->waktu = $request->waktu;
        $PeminjamanAlat->id_alat = $request->id_alat;
        $PeminjamanAlat->jumlah = $request->jumlah;
        $PeminjamanAlat->lama_peminjaman = $request->lama_peminjaman;
        $PeminjamanAlat->keperluan = $request->keperluan;
        try {
            $PeminjamanAlat->saveOrFail();
        } catch (Throwable $e) {
            dd($PeminjamanAlat, $e);
        }

        return redirect()->route('PeminjamanAlat.index');
    }

    public function show($id){
        $PeminjamanAlat = PeminjamanAlatModel::select(['*'])
            ->join('alat_models','peminjaman_alat_models.id_alat','alat_models.id_alat')
            ->join('mahasiswa_models','peminjaman_alat_models.id_mahasiswa','mahasiswa_models.id_mahasiswa')
            ->join('program_studi_models','mahasiswa_models.id_prodi','program_studi_models.id_prodi')
            ->join('angkatan_models','mahasiswa_models.id_angkatan_mahasiswa','angkatan_models.id_angkatan')
            ->where('id',$id)
            ->first();
        $context = array(
            'PeminjamanAlat' => $PeminjamanAlat,
        );

        return view('PeminjamanAlat.View', $context);
    }

    public function edit($id){
        $PeminjamanAlat = PeminjamanAlatModel::select(['*'])
            ->join('alat_models','peminjaman_alat_models.id_alat','alat_models.id_alat')
            ->join('mahasiswa_models','peminjaman_alat_models.id_mahasiswa','mahasiswa_models.id_mahasiswa')
            ->join('program_studi_models','mahasiswa_models.id_prodi','program_studi_models.id_prodi')
            ->join('angkatan_models','mahasiswa_models.id_angkatan_mahasiswa','angkatan_models.id_angkatan')
            ->where('id',$id)
            ->first();
        $Alat = AlatModel::all(['*']);
        $Peminjam = MahasiswaModel::all(['*']);
        if (!$PeminjamanAlat): abort(404); endif;
        $context = array(
            'PeminjamanAlat' => $PeminjamanAlat,
            'Alat' => $Alat,
            'Peminjam' => $Peminjam
        );
//        dd($PeminjamanAlat, $context);
        return view('PeminjamanAlat.Edit', $context);
    }

    public function update(Request $request, $id){
        $PeminjamanAlat = PeminjamanAlatModel::find($id);
        $PeminjamanAlat->id_mahasiswa = $request->id_mahasiswa;
        $PeminjamanAlat->hari = $request->hari;
        $PeminjamanAlat->tanggal = $request->tanggal;
        $PeminjamanAlat->waktu = $request->waktu;
        $PeminjamanAlat->id_alat = $request->id_alat;
        $PeminjamanAlat->jumlah = $request->jumlah;
        $PeminjamanAlat->lama_peminjaman = $request->lama_peminjaman;
        $PeminjamanAlat->keperluan = $request->keperluan;
        try {
            $PeminjamanAlat->update();
        } catch (Throwable $e) {
            dd($PeminjamanAlat, $e);
        }

        return redirect()->route('PeminjamanAlat.index');
    }

    public function destroy($id){
        $PeminjamanAlat = PeminjamanAlatModel::find($id);
        if (!$PeminjamanAlat): abort(404); endif;
        try {
            $PeminjamanAlat->delete();
        } catch (Throwable $e) {
            dd($PeminjamanAlat, $e);
        }

        return redirect()->route('PeminjamanAlat.index');
    }
}
