<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Fileentry;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Request;
use Intervention\Image\ImageManager;
//use Intervention\Image\Image;
use Intervention\Image\Facades\Image;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

//use Illuminate\Support\Facades\Response;

class FileEntryController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $entries = Fileentry::where('banned', 0)->paginate(4);

        return view('fileentries.index', compact('entries'));

    }

    public function add(Request $request)
    {

        $user = Auth::user();
        $banned_phashes = Fileentry::where('banned', 1)->get();

        if ($request->hasFile('filefield')) {
            $file = $request->file('filefield');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = 'public/projects/' . $user->name . '/';
            $ban_path = 'public/banned/';
            Storage::makeDirectory($path, 0777, true, true);
            $full_path = $file->move(storage_path('app/public/projects/' . $user->name . '/'), $filename);
            $storage_path = '/storage/projects/' . $user->name . '/' . $filename;
            $imgPhash = Fileentry::getImgPhash($full_path);

            $entry = new Fileentry();
            $entry->mime = $file->getClientMimeType();
            $entry->original_filename = $file->getClientOriginalName();
            $entry->filename = $filename;
            $entry->phash = serialize($imgPhash);
            $entry->banned = 0;
            $entry->storage_path = $storage_path;

            foreach ($banned_phashes as $banned_phash) {
                $imgPhashSimilarity = Fileentry::getHammingSimilarity($imgPhash, unserialize($banned_phash->phash));
                if ($imgPhashSimilarity >= 80) {
                    Storage::makeDirectory($ban_path, 0777, true, true);
                    File::move($full_path, storage_path('app/public/banned/') . $filename);
                    $entry->banned = 1;
                    $entry->storage_path = 'storage/banned/' . $filename;
                    $entry->save();

                    return redirect('fileentry')->with('ban_error', 'The upload image content is inappropriate and it will be banned' . ' ' . ($imgPhashSimilarity));
                }
            }

            $entry->save();
            return redirect('fileentry')->with('success', 'Image has been uploaded');

        }

        return redirect('fileentry');

    }

    public function get($filename)
    {

        $entry = Fileentry::where('filename', '=', $filename)->firstOrFail();
        $file = Storage::disk('public')->get($entry->$filename);

        return (new Response($file, 200))
            ->header('Content-Type', $entry->mime);
    }

}
