<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function matakuliahs()
    {
        return $this->belongsTo(Matakuliah::class, 'id_matakuliah');
    }
}
