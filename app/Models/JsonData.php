<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JsonData extends Model
{
    use HasFactory;

    protected $fillable = ['json_data', 'status_orden'];

    protected $casts = [
        'json_data' => 'array',
        'status_orden' => 'integer',
    ];
}
