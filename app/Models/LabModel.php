<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LabModel extends Model{

    public function peminjam(){
        return $this->belongsTo(PeminjamModel::class);
    }
}
