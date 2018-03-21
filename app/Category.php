<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title','short_name'];

    public function news(){
        return $this->hasMany('App\News');
    }

}
