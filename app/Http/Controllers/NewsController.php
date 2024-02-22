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

    public function getNewsCategoryById($id)
    {
        $newsCategory = NewsCategories::find($id);
        return response()->json([
            'category' => $newsCategory
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

        $filePaths = [];
        if ($request->hasfile('files')) {

            foreach ($request->file('files') as $file) {
                $path = $file->store('public/news_images');
                $filePaths[] = str_replace('public/', '', $path);
            }
        }

        foreach ($filePaths as $order => $path) {
            $newsImage = new NewsImages();
            $newsImage->path = $path;
            $newsImage->alt = 'News image';
            $newsImage->order = $order + 1;
            $newsImage->news_id = $news->id;
            $newsImage->save();
        }

        return response()->json([
            'message' => 'News created successfully',
            'filePaths' => $filePaths
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

    public function editNews(Request $request, $id)
    {
        $news = News::find($id);
        $news->title = $request->title;
        $news->content = $request->content;
        $news->news_category_id = $request->news_category_id;
        $news->user_id = $request->user_id;
        $news->save();

        return response()->json([
            'message' => 'News updated successfully'
        ], 200);
    }

    public function createNewsCategory(Request $request)
    {
        $newsCategory = new NewsCategories();
        $newsCategory->name = $request->name;
        $newsCategory->slug = $request->slug;
        $newsCategory->save();

        return response()->json([
            'message' => 'News category created successfully'
        ], 201);
    }

    public function deleteNewsCategory($id)
    {
        $newsCategory = NewsCategories::find($id);
        $newsCategory->delete();

        return response()->json([
            'message' => 'News category deleted successfully'
        ], 200);
    }

    public function editNewsCategory(Request $request, $id)
    {
        $newsCategory = NewsCategories::find($id);
        $newsCategory->name = $request->name;
        $newsCategory->slug = $request->slug;
        $newsCategory->save();

        return response()->json([
            'message' => 'News category updated successfully'
        ], 200);
    }
}
