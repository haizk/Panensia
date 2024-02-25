<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = [
        'name', 'desc', 'logo_path', 'address', 'link_ig'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    use HasFactory;
}
