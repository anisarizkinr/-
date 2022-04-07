<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\mahasiswa;



class Kelas extends Model
{
    use HasFactory;
    protected $table='kelas'; //mendefinisiskan bahwa model ini terkait dengan tabel kelas

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }
}
