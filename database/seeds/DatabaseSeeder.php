<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('TreeTableSeeder');
        $this->call('BranchTableSeeder');
    }
}

class TreeTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('trees')->delete();
        \App\Tree::create([ 'title'=>'Tree Teste', 'user_id'=>1]);
    }
}

class BranchTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('branches')->delete();
        \App\Branch::create([ 'title'=>'1', 'body'=>'1', 'tree_id'=>1]);
        \App\Branch::create([ 'title'=>'1.1', 'body'=>'1.1', 'tree_id'=>1, 'branch_id'=>1]);
        \App\Branch::create([ 'title'=>'1.2', 'body'=>'1.2', 'tree_id'=>1, 'branch_id'=>1]);
        \App\Branch::create([ 'title'=>'1.2.1', 'body'=>'1.2.1', 'tree_id'=>1, 'branch_id'=>3]);
    }
}

