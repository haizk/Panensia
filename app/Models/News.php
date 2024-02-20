<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'user_id', 'news_category_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function newsCategory()
    {
        return $this->belongsTo(NewsCategories::class);
    }

    public function newsImages()
    {
        return $this->hasMany(NewsImages::class);
    }
}
