<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductUz extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'foto',
        'price',
        'category_id',
        'description'
    ];
}
