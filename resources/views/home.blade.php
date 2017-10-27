@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Minhas Arvores</div>
                <div class="panel-body">
                    <div class="list-group">
                        @foreach($trees as $tree)
                        <a href="{{route('branch', ['id' => $tree->id])}}" class="list-group-item">
                            <span class="badge">{{count($tree->branches)}}</span>
                            {{$tree->title}}
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Criar Nova Arvore</div>
                <div class="panel-body">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
