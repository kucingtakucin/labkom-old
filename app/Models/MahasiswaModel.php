<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MahasiswaModel extends Model{

    public function alat(){
        return $this->hasMany(AlatModel::class, 'id_alat', 'id_mahasiswa');
    }

    public function lab(){
        $this->hasMany(LabModel::class, 'id_lab', 'id_mahasiswa');
    }

    public function angkatan(){
        $this->hasOne(AngkatanModel::class);
    }
}
