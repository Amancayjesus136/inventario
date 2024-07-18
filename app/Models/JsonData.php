<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JsonData extends Model
{
    use HasFactory;
    protected $fillable = ['json_data'];

    protected $casts = [
        'json_data' => 'array', // Para trabajar con datos JSON como arrays
    ];
}
