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

    public function getNewsCategories()
    {
        $newsCategories = NewsCategories::all();
        return response()->json([
            'categories' => $newsCategories
        ], 200);
    }

    public function createNews(Request $request)
    {
        $news = new News();
        $news->title = $request->title;
        $news->content = $request->content;
        $news->news_category_id = $request->news_category_id;
        $news->user_id = $request->user_id;
        $news->save();

        return response()->json([
            'message' => 'News created successfully'
        ], 201);
    }

    public function deleteNews($id)
    {
        $news = News::find($id);
        NewsImages::where('news_id', $id)->delete();
        $news->delete();

        return response()->json([
            'message' => 'News deleted successfully'
        ], 200);
    }
}
