<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id_product';
    protected $fillable =
    [
        'name_product',
        'price_product',
        'photo_product',
        'category_product',
        'size_product',
        'description_product',
        'dicount_product',
        'user_created_product',
        'user_updated_product',
        'date_created_product',
        'date_updated_product',
        'status_product',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_product', 'id_category');
    }
}
