<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horarios extends Model
{
    use HasFactory;
    protected $table = 'horarios';
    protected $primaryKey = 'id_horario';
    protected $fillable =
    [
        'dia_horario_atencion',
        'disposicion_horario_atencion',
        'hora_horario_inicio',
        'hora_horario_final',
        'status_horario',
    ];
}
