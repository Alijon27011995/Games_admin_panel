<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    // protected $table = 'news';
    use HasFactory;
    protected $fillable = [
        'id',
        'theme',
        'description',
    ];

    // public function orderDetails()
    // {
    //     return $this->hasMany(OrderDetail::class);
    // }
    // public function user()
    // {
    //     // dd($this);
    //     return $this;
    //     // return $this->hasMany(OrderDetail::class);
    //     // return $this->belongsTo(User::class);
    // }
}
