<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultipleProduct extends Model
{
    use HasFactory;
    protected $table = 'multiple_products';
    protected $primaryKey = 'id_multiple_products';
    protected $fillable = [
        'size_product_multiple',
        'price_product_multiple',
        'discount_product_multiple',
        'user_created_product_multiple',
        'user_updated_product_multiple',
        'date_created_product_multiple',
        'date_updated_product_multiple',
        'status_product_multiple',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'relation_products', 'id_multiple_products', 'id_product');
    }
}
