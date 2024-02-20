<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function getNews()
    {
        $news = News::with('newsImages', 'user', 'newsCategory')->get();
        return response()->json([
            'news' => $news
        ], 200);
    }
}
