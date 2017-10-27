<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    public function tree()
    {
        return $this->belongsTo('App\Tree');
    }

    public function branchsSon()
    {
        return $this->belongsTo("App\Branch", "branches_id");
    }

    public function branchFather()
    {
        return $this->hasMany("App\Branch")->where("branches_id", $this->id);;
    }

}
