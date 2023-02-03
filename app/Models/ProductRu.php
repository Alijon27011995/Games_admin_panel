<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRu extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name_uz',
        'product_name_ru',
        'foto',
        'price',
        'category_id',
        'description_ru',
        'description_uz',
        'soft_delete',
        'parent_id'
    ];
}
