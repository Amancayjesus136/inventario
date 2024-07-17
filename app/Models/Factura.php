<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $table = 'facturas';
    protected $primaryKey = 'id_factura';

    protected $fillable = [
        'name_mesa',
        'nombres_clientes',
        'fecha_factura',
        'total_factura',
        'user_created_product',
        'user_updated_product',
        'date_created_product',
        'date_updated_product',
        'status_factura',
    ];

    public function relations()
    {
        return $this->hasMany(FacturaRelation::class, 'id_factura');
    }
}
