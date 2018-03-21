<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Comment;
use App\News;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Fileentry;

class CommentController extends Controller
{
    public function store(Request $request)
    {
//        dd($request);
        $newsId = $request->get('news_id');
        $user = Auth::user();
        $comments = $this->validate(request(), [
//            'name' => 'required',
//            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $comments['news_id'] = $newsId;
        $comments['name'] = $user->name;
        $comments['email'] = $user->email;
        $comments['fileentries_id'] = 1;
        $com_obj = Comment::create($comments);
//        return back()->with('success', 'Comment has been added');
//        dd($com_obj);
//        $user = Auth::user();

        if ($request->hasFile('filefield')) {
            $file = $request->file('filefield');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = 'public/projects/' . $user->name . '/';
            $ban_path = 'public/banned/';
            Storage::makeDirectory($path, 0777, true, true);
//            Storage::disk('public')->put($filename, file_get_contents($file));
            $full_path = $file->move(storage_path('app/public/projects/' . $user->name . '/'), $filename);
            $storage_path = '/storage/projects/' . $user->name . '/' . $filename;
//            Image::make($file->getRealPath())->save();
            $imgPhash = Fileentry::getImgPhash($full_path);
//            dd($comments);
            $entry = new Fileentry();
            $entry->comment_id = $com_obj->id;
            $entry->mime = $file->getClientMimeType();
            $entry->original_filename = $file->getClientOriginalName();
            $entry->filename = $filename;
            $entry->phash = serialize($imgPhash);
            $entry->banned = 0;
            $entry->storage_path = $storage_path;

            $banned_phashes = Fileentry::where('banned', 1)->get();
            foreach ($banned_phashes as $banned_phash) {
                $imgPhashSimilarity = Fileentry::getHammingSimilarity($imgPhash, unserialize($banned_phash->phash));
//                dd($imgPhashSimilarity);
                if ($imgPhashSimilarity >= 80) {
                    Storage::makeDirectory($ban_path, 0777, true, true);
                    File::move($full_path, storage_path('app/public/banned/') . $filename);
                    $entry->banned = 1;
                    $entry->storage_path = 'storage/banned/' . $filename;
                    $entry->save();
                    Comment::where('id', $com_obj->id)->update(['fileentries_id' => $entry->id]);
                    return back()->with('ban_error', 'The upload image content is inappropriate and it will be banned' . ' ' . ($imgPhashSimilarity));
                }
            }

            $entry->save();
            Comment::where('id', $com_obj->id)->update(['fileentries_id' => $entry->id]);
            return back()->with('success', 'Image has been uploaded');

        } else {

            return back()->with('success', 'Comment has been uploaded');
        }
    }

    public function delete (Request $request)
    {

    }
}
