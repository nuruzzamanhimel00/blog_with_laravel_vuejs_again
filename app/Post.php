<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [''];

    public function category()
    {
        return $this->belongsTo('App\Category','cat_id','id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

}
