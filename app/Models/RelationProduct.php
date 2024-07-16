<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelationProduct extends Model
{
    use HasFactory;
    protected $table = 'relation_products';
    protected $primaryKey = 'id_evento';
    protected $fillable =
    [
        'id_product',
        'id_multiple_products',
    ];
}
