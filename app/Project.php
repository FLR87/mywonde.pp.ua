<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title','short_description','short_name','content',
        'img_path','user_id'];

    public function users(){
        return $this->belongsTo('App\User');
    }


}
