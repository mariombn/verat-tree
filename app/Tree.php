<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tree extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function branches()
    {
        return $this->hasMany('App\Branch');
    }
}
