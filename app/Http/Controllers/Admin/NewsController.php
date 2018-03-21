<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\News;
use App\User;
use App\Role;
use App\Category;
use App\Comment;
use Illuminate\Support\Facades\Auth;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categoryId = $request->input('category_id');

        if ($categoryId) {
            $news = News::where('category_id', $categoryId)->paginate(5);
        } else {
            $news = News::paginate(5);
        }

        $categories = Category::all();
//        dd($categories);
        return view('news.index', ['news' => $news, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
//            $day_news = News::get();
//            dd($day_news);
        return view('news.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $news = $this->validate(request(), [
            'title' => 'required',
            'short_name' => 'required',
            'content' => 'required',
            'category_id' => 'required|min:1|max:4|',
            'short_description' => 'required',
            'img_path' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//            'day_news' => 'required|min:0|max:1|',
//            'user_id' => 'required',
        ]);

        $news ['user_id'] = Auth::user()->id;
//        $news ['img_path'] = News::getOriginalName();
        $news ['day_news'] = 1;

        if ($request->hasFile('img_path')) {
            $file = $request->file('img_path');
            $news['img_path'] = News::getOriginalName($file);
            $file->move(public_path() . '/images/uploaded', $news['img_path']);
        }

        if (News::create($news)) {
            return back()->with('success', 'Task has been added');
        }
        return back()->with('error', 'Task error');


//        $news = News::create($news);
//        return back()->with('success', 'News has been added');
    }
//======================Vadim=================================================
//        $image = Storage::disk('public')->put(
//            'test.jpg',
//            file_get_contents($request->file('img_path')->getRealPath())
//        );
//
//        $get = Storage::disk('public')->get('test.jpg');
//        $url = Storage::disk('public')->url('test.jpg');
//
//        dd($get, $url);
//
//
//
//        dd($image);
//=========================================================================
//

    /**
     * Display the specified resource.
     *
     * @param  \App\News $news
     * @return \Illuminate\Http\Response
     */
    public function show($short_name)
    {
//        $news = News::where('short_name', $short_name)->first();
//        $user_id = $news->id;
//
//        $comments = Comment::where('user_id', $user_id);
//        $comments = Comment::all();
//
//        return view('shownews', compact('shownews', 'short_name'), ['news' => $news, 'comments' => $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);
        $categories = Category::all();
        return view('news.edit', compact('news', 'id'), ['categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\News $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $news = News::find($id);
        $this->validate(request(), [
            'title' => 'required',
            'short_name' => 'required',
            'content' => 'required',
            'short_description' => 'required',
            'category_id' => 'required',
        ]);
        $news->title = $request->get('title');
        $news->short_name = $request->get('short_name');
        $news->content = $request->get('content');
        $news->short_description = $request->get('short_description');
        $news->category_id = $request->get('category_id');

        $news->save();

        return redirect('admin/news')->with('success', 'Task has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = News::find($id);
        $task->delete();
        return redirect('admin/news')->with('success', 'Task has been deleted');
    }
}
