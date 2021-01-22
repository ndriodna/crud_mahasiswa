<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;
    protected $fillable = ['kd_jurusan','nama_jurusan','akreditasi'];

    public function mahasiswa()
    {
    	return $this->hasMany(Mahasiswa::class);
    }
}
