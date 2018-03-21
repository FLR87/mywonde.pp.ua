<?php

namespace App;

use Phash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class Fileentry extends Model
{
    protected $fillable = ['filename','mime','original_filename','phash',
        'storage_path','banned','comment_id'];

    public function comments(){
        return $this->belongsTo('App\Comment');
    }

    public static function getImgPhash($full_path)
    {
        include(app_path() . '/phash.php');

//        dd($full_path);
//        dd($file->getRealPath());
        $phasher = new Phash;
        $tmphash = $phasher->getHash($full_path, false);
//        $phash = $phasher->hashAsString($tmphash, false);
//        $img_phash = $phasher->hashAsString($tmphash);
//        return $img_phash;
        return $tmphash;
    }

    public static function getHammingSimilarity($phash1,$phash2)
    {

        $phasher = new Phash;
        $hmng_sim_prct = $phasher->getSimilarity($phash1, $phash2);
        return $hmng_sim_prct;
    }

}
