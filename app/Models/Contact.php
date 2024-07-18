<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contacts';
    protected $primaryKey = 'id_contact';
    protected $fillable =
    [
        'nombres_contact',
        'apellidos_contact',
        'motivo_contact',
        'mensaje_contact',
        'status_contact',
    ];
}
