<?php

namespace App\Http\Controllers;

use App\Models\AngkatanModel;
use App\Models\MahasiswaModel;
use App\Models\ProgramStudiModel;
use Illuminate\Http\Request;
use Throwable;

class MahasiswaController extends Controller{

    public function index(){
        $Mahasiswa = MahasiswaModel::select(['*'])
            ->join('program_studi_models','mahasiswa_models.id_prodi','program_studi_models.id_prodi')
            ->join('angkatan_models','mahasiswa_models.id_angkatan_mahasiswa','angkatan_models.id_angkatan')
            ->get();
        $context = array(
            'Mahasiswa' => $Mahasiswa,
            'i' => 1
        );
        return view('Mahasiswa.Mahasiswa', $context);
    }

    public function create(){
        $Angkatan = AngkatanModel::all(['*']);
        $Jurusan = ProgramStudiModel::all(['*']);
        $context = array(
            'Angkatan' => $Angkatan,
            'Jurusan' => $Jurusan
        );
        return view('Mahasiswa.Create', $context);
    }

    public function store(Request $request){
        $Mahasiswa = new MahasiswaModel();
        $Mahasiswa->nama_mahasiswa = $request->nama_mahasiswa;
        $Mahasiswa->nim_mahasiswa = $request->nim_mahasiswa;
        $Mahasiswa->jenis_kelamin_mahasiswa = $request->jenis_kelamin_mahasiswa;
        $Mahasiswa->kelas_mahasiswa = $request->kelas_mahasiswa;
        $Mahasiswa->id_prodi = $request->id_prodi;
        $Mahasiswa->id_angkatan_mahasiswa = $request->id_angkatan_mahasiswa;
//        dd($request);
        try {
            $Mahasiswa->saveOrFail();
        } catch (Throwable $e) {
            dd($Mahasiswa, $e);
        }

        return redirect()->route('Mahasiswa.index');
    }

    public function show($id){
        $Mahasiswa = MahasiswaModel::select(['*'])
            ->join('program_studi_models','mahasiswa_models.id_prodi','program_studi_models.id_prodi')
            ->join('angkatan_models','mahasiswa_models.id_angkatan_mahasiswa','angkatan_models.id_angkatan')
            ->where('id_mahasiswa',$id)
            ->first();
        $Angkatan = AngkatanModel::all(['*']);
        $Jurusan = ProgramStudiModel::all(['*']);
        $context = array(
            'Mahasiswa' => $Mahasiswa,
            'Angkatan' => $Angkatan,
            'Jurusan' => $Jurusan
        );

        return view('Mahasiswa.View', $context);
    }

    public function edit($id){
        $Mahasiswa = MahasiswaModel::select(['*'])
            ->join('program_studi_models','mahasiswa_models.id_prodi','program_studi_models.id_prodi')
            ->join('angkatan_models','mahasiswa_models.id_angkatan_mahasiswa','angkatan_models.id_angkatan')
            ->where('id_mahasiswa',$id)
            ->first();
        $Angkatan = AngkatanModel::all(['*']);
        $Jurusan = ProgramStudiModel::all(['*']);
        if (!$Mahasiswa): abort(404); endif;
        $context = array(
            'Mahasiswa' => $Mahasiswa,
            'Angkatan' => $Angkatan,
            'Jurusan' => $Jurusan
        );

        return view('Mahasiswa.Edit', $context);
    }

    public function update(Request $request, $id){
        $Mahasiswa = MahasiswaModel::select(['*'])->where('id_mahasiswa',$id);
        try {
            $Mahasiswa->update([
                'nama_mahasiswa' => $request->nama_mahasiswa,
                'jenis_kelamin_mahasiswa' => $request->jenis_kelamin_mahasiswa,
                'nim_mahasiswa' => $request->nim_mahasiswa,
                'kelas_mahasiswa' => $request->kelas_mahasiswa,
                'id_prodi' => $request->id_prodi,
                'id_angkatan_mahasiswa' => $request->id_angkatan_mahasiswa
            ]);
        } catch (Throwable $e) {
            dd($Mahasiswa, $e);
        }

        return redirect()->route('Mahasiswa.index');
    }

    public function destroy($id){
        $Mahasiswa = MahasiswaModel::select(['*'])->where('id_mahasiswa',$id);
        if (!$Mahasiswa): abort(404); endif;
        try {
            $Mahasiswa->delete();
        } catch (Throwable $e) {
            dd($Mahasiswa, $e);
        }

        return redirect()->route('Mahasiswa.index');
    }
}
