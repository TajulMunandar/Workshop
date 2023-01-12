<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function materis()
    {
        return $this->hasMany(Materi::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function prodis()
    {
        return $this->belongsTo(Prodi::class, 'id_prodi');
    }
}
