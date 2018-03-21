<?php

namespace App\Http\Controllers\Admin;

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
//        $user = Auth::user();
        $entries = Fileentry::where('banned', 0)->paginate(5);
//        $entries = Fileentry::where('banned', 0)->paginate(4);

        return view('fileentries.adminindex', compact('entries'));

    }

    public function existBannedPhashes($banned_phashes, $imgPhash)
    {
        foreach ($banned_phashes as $banned_phash) {
            $imgPhashSimilarity = Fileentry::getHammingSimilarity($imgPhash, unserialize($banned_phash->phash));
            if ($imgPhashSimilarity >= 90) {
                return [
                    'exist' => true,
                    'message' => 'The picture you are trying to upload with a probability of ' . ($imgPhashSimilarity) . '% is already banned'
                ];
            }
        }

        return [
            'exist' => false,
            'message' => 'The picture you are trying to upload with .....'
        ];
    }

    public function addImg2Ban(Request $request)
    {

        $user = Auth::user();
        $banned_phashes = Fileentry::where('banned', 1)->get();
//dd($banned_phashes);
        if ($request->hasFile('filefield')) {
            $file = $request->file('filefield');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = '/public/projects/' . $user->name . '/';
            $ban_path = '/public/banned/';
            Storage::makeDirectory($path, 0777, true, true);
            $full_path = $file->move(storage_path('app/public/projects/' . $user->name . '/'), $filename);
            $storage_path = '/storage/projects/' . $user->name . '/' . $filename;
            $imgPhash = Fileentry::getImgPhash($full_path);


            /**
             * 1) Вернет результат true||false если картика The picture you are trying to upload with a probability
             *
             *
             */
            $isExist = $this->existBannedPhashes($banned_phashes, $imgPhash);

            if (!$isExist['exist']) {
                $entry = new Fileentry();
                $entry->mime = $file->getClientMimeType();
                $entry->original_filename = $file->getClientOriginalName();
                $entry->filename = $filename;
                $entry->phash = serialize($imgPhash);
                $entry->storage_path = $storage_path;
                Storage::makeDirectory($ban_path, 0777, true, true);
                File::move($full_path, storage_path('app/public/banned/') . $filename);
                $entry->banned = 1;
                $entry->storage_path = '/storage/banned/' . $filename;
                $entry->save();

                return back()->with('success', $isExist['message']);
            } else {
                return back()->with('success', $isExist['message']);
            }
        }
    }

}
