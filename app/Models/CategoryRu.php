<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryRu extends Model
{
    protected $fillable = [
        'category_name_ru',
        'foto',
        'category_name_uz',
        // 'lat',
    ];
    use HasFactory;

}
