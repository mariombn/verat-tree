@extends('layouts.app')

@section('content')

    <script>
        $(document).ready(function(){
            //var tree =

            $.ajax({
                url: '/api/tree/get/1',
                dataType: 'JSON',
                success: function(row){
                    var tree = $('#tree').treeview({
                        data: row,
                        levels: 99
                    });
                    tree.on('nodeSelected', function(e, node){
                        callDataBranch(node.id);
                    });
                }
            });

            function callDataBranch(id) {
                $.ajax({
                    url: '/api/branch/get/' + id,
                    dataType: 'JSON',
                    success: function(data){
                        $("#title").html(data.title);
                        $("#body").html(data.body);
                        $("#body-edit-input").html(data.body);

                    }
                });
            }

            $('#btn-edit').click(function(){
                if ($('#body-edit').is(':visible')) {
                    $('#body-edit').hide();
                } else {
                    $('#body-edit').show();
                }
            });

            $('#body-edit-input').keyup(function(){
                var converter = new showdown.Converter(),
                    text      = $('#body-edit-input').val(),
                    html      = converter.makeHtml(text);


                $("#body").html(html);
            });
        });
    </script>

    <div class="row">
        <div class="col-md-3">$
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="btn-group pull-right">
                        <a href="#" class="btn btn-default"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                    </div>
                    <h5>{{$tree->title}}</h5>
                </div>
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
                <div class="panel-heading">
                    <div class="btn-group pull-right">
                        <button id="btn-edit" class="btn btn-default"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button>
                    </div>
                    <h5 id="title">Titulo da Branch</h5>
                </div>
                <div class="panel-body">
                    <div id="body-edit" style="display: none; margin-bottom: 10px;">
                        <textarea id="body-edit-input" class="form-control" rows="10"></textarea>
                    </div>
                    <div id="body">

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
