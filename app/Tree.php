<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Branch;

class Tree extends Model
{
    public function getDataTree()
    {
        $branches = $this->branches()->orderBy('branch_id')->orderBy('orderby')->orderBy('id')->get();

        $arr = array();
        $count = 0;
        foreach ($branches as $branch) {
            $arr[$count]['id'] = $branch->id;
            $arr[$count]['text'] = $branch->title;
            $arr[$count]['branch_id'] = $branch->branch_id;
            $count++;
        }


        $new = array();
        foreach ($arr as $a){
            $new[$a['branch_id']][] = $a;
        }
        $tree = $this->createTree($new, array($arr[0]));

        return json_encode($tree);
    }

    private function createTree(&$list, $parent){
        $tree = array();
        foreach ($parent as $k=>$l){
            if(isset($list[$l['id']])){
                $l['nodes'] = $this->createTree($list, $list[$l['id']]);
            }
            $tree[] = $l;
        }
        return $tree;
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function branches()
    {
        return $this->hasMany('App\Branch');
    }
}
