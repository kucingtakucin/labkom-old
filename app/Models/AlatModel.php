<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PeminjamModel;

class AlatModel extends Model{

    public function peminjam(){
        return $this->belongsTo(PeminjamModel::class);
    }
}
