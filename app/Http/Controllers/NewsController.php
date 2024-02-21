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

    public function getNewsById($id)
    {
        $news = News::with('newsImages', 'user', 'newsCategory')->find($id);
        return response()->json([
            'news' => $news
        ], 200);
    }
}
