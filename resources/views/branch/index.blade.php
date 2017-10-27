@extends('layouts.app')

@section('content')

    <script>
        $(document).ready(function(){
            var tree = [
                {
                    text: "Parent 1",
                    nodes: [
                        {
                            text: "Child 1",
                            nodes: [
                                {
                                    text: "Grandchild 1"
                                },
                                {
                                    text: "Grandchild 2"
                                }
                            ]
                        },
                        {
                            text: "Child 2",
                            href: "/home"
                        }
                    ]
                },
                {
                    text: "Parent 2"
                },
                {
                    text: "Parent 3"
                },
                {
                    text: "Parent 4"
                },
                {
                    text: "Parent 5"
                }
            ];

            $('#tree').treeview({
                data: tree,
                levels: 1
            });
        });
    </script>

    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">{{$tree->title}}</div>
                <div class="panel-body">
                    <div class="list-group">

                        <div id="tree">
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Criar Nova Arvore</div>
                <div class="panel-body">

                </div>
            </div>
        </div>
    </div>
@endsection
