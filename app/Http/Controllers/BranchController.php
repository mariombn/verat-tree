<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tree;
use App\Branch;

class BranchController extends Controller
{
    public function getByTreeId($tree_id)
    {
        $tree = Tree::find($tree_id);
        echo $tree->getDataTree();
    }

    public function getById($branch_id)
    {
        $branch = Branch::find($branch_id);
        echo $branch->getData();
    }
}
