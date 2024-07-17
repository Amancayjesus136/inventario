<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacturaRelation extends Model
{
    use HasFactory;

    protected $table = 'facturas_relations';
    protected $primaryKey = 'id_factura_relations';

    protected $fillable = [
        'name_product_factura',
        'size_product_factura',
        'price_product_factura',
        'igv_incluido',
        'total_factura',
        'id_factura',
    ];

    public function factura()
    {
        return $this->belongsTo(Factura::class, 'id_factura');
    }
}
