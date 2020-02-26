<?php

namespace App\Http\Controllers;

use App\Models\JasaInstallasiModel;
use App\Models\MahasiswaModel;
use App\Models\SoftwareModel;
use Illuminate\Http\Request;
use Throwable;

class JasaInstallasiController extends Controller{

    public function index(){
        $JasaInstallasi = JasaInstallasiModel::select(['*'])
            ->join('mahasiswa_models','jasa_installasi_models.id_mahasiswa','mahasiswa_models.id_mahasiswa')
            ->join('program_studi_models','mahasiswa_models.id_prodi','program_studi_models.id_prodi')
            ->join('angkatan_models','mahasiswa_models.id_angkatan_mahasiswa','angkatan_models.id_angkatan')
            ->join('software_models','jasa_installasi_models.id_software','software_models.id_software')
            ->get();
        $context = array(
            'JasaInstallasi' => $JasaInstallasi,
            'i' => 1
        );
//        dd($context);
        return view('JasaInstallasi.JasaInstallasi', $context);
    }

    public function create(){
        $Mahasiswa = MahasiswaModel::all(['*']);
        $Software = SoftwareModel::all(['*']);
        $context = array(
            'Mahasiswa' => $Mahasiswa,
            'Software' => $Software
        );
        return view('JasaInstallasi.Create', $context);
    }

    public function store(Request $request){
        $JasaInstallasi = new JasaInstallasiModel();
        $JasaInstallasi->id_mahasiswa = $request->id_mahasiswa;
        $JasaInstallasi->no_hp = $request->no_hp;
        $JasaInstallasi->hari = $request->hari;
        $JasaInstallasi->tanggal = $request->tanggal;
        $JasaInstallasi->laptop = $request->laptop;
        $JasaInstallasi->spesifikasi = $request->spesifikasi;
        $JasaInstallasi->kelengkapan = $request->kelengkapan;
        $JasaInstallasi->id_software = $request->id_software;
        $JasaInstallasi->install_ulang = $request->install_ulang;
        $JasaInstallasi->lainlain = $request->lainlain;
        try {
            $JasaInstallasi->saveOrFail();
        } catch (Throwable $e) {
            dd($JasaInstallasi, $e);
        }

        return redirect()->route('JasaInstallasi.index');
    }

    public function show($id){
        $JasaInstallasi = JasaInstallasiModel::select(['*'])
            ->join('mahasiswa_models','jasa_installasi_models.id_mahasiswa','mahasiswa_models.id_mahasiswa')
            ->join('program_studi_models','mahasiswa_models.id_prodi','program_studi_models.id_prodi')
            ->join('angkatan_models','mahasiswa_models.id_angkatan_mahasiswa','angkatan_models.id_angkatan')
            ->join('software_models','jasa_installasi_models.id_software','software_models.id_software')
            ->where('id',$id)
            ->first();
        $context = array(
            'JasaInstallasi' => $JasaInstallasi,
        );

        return view('JasaInstallasi.View', $context);
    }

    public function edit($id){
        $JasaInstallasi = JasaInstallasiModel::select(['*'])
            ->join('mahasiswa_models','jasa_installasi_models.id_mahasiswa','mahasiswa_models.id_mahasiswa')
            ->join('program_studi_models','mahasiswa_models.id_prodi','program_studi_models.id_prodi')
            ->join('angkatan_models','mahasiswa_models.id_angkatan_mahasiswa','angkatan_models.id_angkatan')
            ->join('software_models','jasa_installasi_models.id_software','software_models.id_software')
            ->where('id', $id)
            ->first();
        $Mahasiswa = MahasiswaModel::all(['*']);
        $Software = SoftwareModel::all(['*']);
        if (!$JasaInstallasi): abort(404); endif;
        $context = array(
            'JasaInstallasi' => $JasaInstallasi,
            'Mahasiswa' => $Mahasiswa,
            'Software' => $Software
        );

        return view('JasaInstallasi.Edit', $context);
    }

    public function update(Request $request, $id){
        $JasaInstallasi = JasaInstallasiModel::find($id);
        $JasaInstallasi->id_mahasiswa = $request->id_mahasiswa;
        $JasaInstallasi->no_hp = $request->no_hp;
        $JasaInstallasi->hari = $request->hari;
        $JasaInstallasi->tanggal = $request->tanggal;
        $JasaInstallasi->laptop = $request->laptop;
        $JasaInstallasi->spesifikasi = $request->spesifikasi;
        $JasaInstallasi->kelengkapan = $request->kelengkapan;
        $JasaInstallasi->id_software = $request->id_software;
        $JasaInstallasi->install_ulang = $request->install_ulang;
        $JasaInstallasi->lainlain = $request->lainlain;
        try {
            $JasaInstallasi->update();
        } catch (Throwable $e) {
            dd($JasaInstallasi, $e);
        }

        return redirect()->route('JasaInstallasi.index');
    }

    public function destroy($id){
        $JasaInstallasi = JasaInstallasiModel::find($id);
        if (!$JasaInstallasi): abort(404); endif;
        try {
            $JasaInstallasi->delete();
        } catch (Throwable $e) {
            dd($JasaInstallasi, $e);
        }

        return redirect()->route('JasaInstallasi.index');
    }
}
