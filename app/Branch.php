<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    public function getData()
    {
        $arrRetorno['title'] = $this->title;
        $arrRetorno['body'] = $this->body;
        return json_encode($arrRetorno);
    }


    public function nodesCount()
    {
        return Branch::whereNotNull('branch_id')->where('branch_id', '=', $this->id)->count();
    }

    public function getNodes()
    {
        return Branch::whereNotNull('branch_id')->where('branch_id', '=', $this->id)->get();
    }

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
