<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $primaryKey = 'id_category';
    protected $fillable =
    [
        'name_category',
        'user_created_category',
        'user_updated_category',
        'date_created_category',
        'date_updated_category',
        'status_category',
    ];
}
