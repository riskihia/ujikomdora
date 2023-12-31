<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Absensi extends Model
{
    use HasFactory;

    protected $fillable = [
        "nama_kelas",
        "tanggal",
        "status",
        "keterangan",
    ];

    public function siswa():BelongsTo
    {
        return $this->belongsTo(Siswa::class, "siswa_id", "id");
    }
}