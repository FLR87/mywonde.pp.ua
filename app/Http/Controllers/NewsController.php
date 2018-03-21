<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Partner;
use Illuminate\Http\Request;
use App\News;
use App\Fileentry;

class NewsController extends Controller
{
    public function index(Request $request, $short_category_name = NULL)
    {
        if ($request->has('news-search')){
            $search = $request->input('news-search');
            $news = News::where('content','like','%'.$search.'%')->paginate(5);
        }else {
//            $news = News::orderBy('id', 'desc')->paginate(5);
            if ($short_category_name) {
                $cat = Category::where('short_name', $short_category_name)->first();

                $news = News::where('category_id', $cat->id)->orderBy('created_at', 'desc')->paginate(5);
            } else {
                $news = News::orderBy('created_at', 'desc')->paginate(5);
            }
        }
            $categories = Category::all();
            $latest_news = News::orderBy('created_at', 'desc')->take(3)->get();
//        dd($news);
//        $news_id = $news[]->id;
//        $comments = Comment::where('news_id',$news_id )->get();

        return view('news', compact('news', 'short_name'), ['news' => $news,
            'categories' => $categories, 'latest_news' => $latest_news]);
    }

    public function showNews($short_category_name, $short_name)
    {

        $news = News::where('short_name', $short_name)->first();
        $news_id = $news->id;
        $categories = Category::all();
//        $collection = News::where('short_name', $short_name)->with('comments.fileentries')->get();

//        dd($collection);
        $fileentries = Fileentry::where('banned', 0)->get();
        $comments = Comment::where('news_id', $news_id)->get();

            $latest_news = News::orderBy('created_at', 'desc')->take(3)->get();
        return view('shownews', compact('shownews', 'short_name'),
            ['news' => $news,
            'categories' => $categories,
            'latest_news'=>$latest_news,
            'comments'=>$comments]);
    }


}
