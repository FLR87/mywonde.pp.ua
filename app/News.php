<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class News extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = ['title','short_name','content','short_description',
    'img_path','day_news','category_id','user_id'];

    public function users(){
        return $this->belongsTo('App\User');
    }
    public function comments(){
        return $this->hasMany('App\Comment');
    }
    public function category(){
        return $this->belongsTo('App\Category');
    }
//    public function fileentries()
//    {
//        return $this->hasManyThrough('App\Fileentry', 'App\Comment');
//    }


    public static function getOriginalName(UploadedFile $file)
    {

        return $newname = date('Y-m-d') . '_' . time() . '_' . $file->getClientOriginalName();

    }


//    public static function getOriginalName(UploadedFile $file)
//    {
//        $roots = dirname(__FILE__,2);
//
//        $dirPathToImage = '\\images\\uploaded\\';
//        $dirpath = '\\public\\images\\uploaded\\';
//        $pathToUpload = $roots.$dirpath;
//        $fileParts = pathinfo($_FILES['img_path']['name']);
//        $newname = date('Y-m-d') . '_' . time() . '_' . $fileParts['filename'] . '.' . $fileParts['extension'];
//        $fullPathToUploud = $roots.$dirpath.$newname;
////        dd($roots,$dirpath,$newname,$fullPathToUploud);
//        $pathToImage = $dirPathToImage.$newname;
//        if ($_FILES['img_path']['error'] == 0) {
//
//            if (move_uploaded_file($_FILES['img_path']['tmp_name'], $fullPathToUploud)) {
//
//            }
//        }
//        return $pathToImage;
//        return $newname;
//    }
//
//}


//
//        $path = '/images/uploaded/';
//        $oldNameToArray = explode('.', $imageNameOld);
//        $ext = array_pop($oldNameToArray); // расширение
//        $old_name = array_shift($oldNameToArray);
//        $new_name = date('Y-m-d') . '_' . time() . '_' . $old_name . '.' . $ext; // новое имя с расширением
//        $fullPathToUploud = $pathToUpload . $new_name; // полный путь с новым именем и расширением
//        $pathToImage = $path . $new_name;
//
//
//        if ($_FILES['img_path']['error'] == 0) {
//
//            if (move_uploaded_file($_FILES['img_path']['tmp_name'], $fullPathToUploud)) {
//
//            }
//        }
//
//        return $pathToImage;
//    }
//
}
