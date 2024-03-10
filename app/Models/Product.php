<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public $table = 'products';

    // public function shop()
    // {
    //     return $this->belongsTo(Shop::class);
    // }
    public function image()
    {
        return $this->hasMany(ProductImage::class);
    }
}
