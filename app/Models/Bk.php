<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bk extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "nuptk",
        "username",
        "password",
    ];

    public function pesans():HasMany
    {
        return $this->hasMany(Pesan::class, "bk_id", "id");
    }
}
