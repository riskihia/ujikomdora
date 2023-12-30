<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        "nis",
        "nama",
        "jenis_kelamin",
        "kelas",
    ];

    public function absensis():HasMany
    {
        return $this->hasMany(Absensi::class, "siswa_id", "id");
    }
}
