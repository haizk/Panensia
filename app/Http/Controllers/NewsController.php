<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\NewsCategories;
use App\Models\NewsImages;

class NewsController extends Controller
{
    public function getNews()
    {
        $news = News::with('newsImages', 'user', 'newsCategory')->get();
        // $images = NewsImages::all();
        // $categories = NewsCategories::all();
        return response()->json([
            'news' => $news
        ], 200);
    }
}
