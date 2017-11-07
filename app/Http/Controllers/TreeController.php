<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tree;

class TreeController extends Controller
{
    public function index($id)
    {
        $tree = Tree::find($id);
        return view('branch.index')
            ->with('tree', $tree);
    }
}
