<?php

namespace App\Models;

use App\MahasiswaModel;
use Illuminate\Database\Eloquent\Model;

class AngkatanModel extends Model{

    public function mahasiswa(){
        return $this->hasMany(MahasiswaModel::class);
    }

    public function peminjam(){
        return $this->belongsToMany(PeminjamModel::class);
    }
}
