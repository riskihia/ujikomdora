<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pesan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "pesan",
    ];

    public function walas():BelongsTo
    {
        return $this->belongsTo(Walas::class, "walas_id", "id");
    }
    public function bks():BelongsTo
    {
        return $this->belongsTo(Bk::class, "bk_id", "id");
    }
}
