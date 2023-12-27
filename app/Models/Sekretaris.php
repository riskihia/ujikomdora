<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekretaris extends Model
{
    use HasFactory;

    protected $fillable = [
        "nuptk",
        "username",
        "password",
    ];
}
