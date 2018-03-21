<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['name','email','subject','message','news_id', 'fileentries_id'];

    public function news(){
        return $this->belongsTo('App\News');
    }
    public function fileentries(){
        return $this->hasMany('App\Fileentry');
    }
}
