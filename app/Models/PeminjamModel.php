<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AlatModel;
use App\Models\LabModel;

class PeminjamModel extends Model{

    public function alat(){
        return $this->hasMany(AlatModel::class, 'id_alat', 'id_peminjam');
    }

    public function lab(){
        $this->hasMany(LabModel::class, 'id_lab', 'id_peminjam');
    }

    public function angkatan(){
        $this->hasOne(AngkatanModel::class);
    }
}
