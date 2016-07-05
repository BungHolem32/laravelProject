@extends('cms.pages.main.index')
@section('title','page managment')
@section('nav-bar')

@stop
@section('header')
    <h2 class="header-title text-uppercase"> Welcome to Page Management</h2>
@stop

@section('content')
    @parent

    <div class="container categories-wrapper">
        <div class="row">

            <a href="#create" class="create-link text-uppercase col-md-4 text-center">create page</a>
            <a href="#edit" class="edit-link text-uppercase col-md-4 text-center">edit page</a>
            <a href="#delete" class="delete-link text-uppercase col-md-4 text-center">delete page</a>

        </div>
    </div>

    <div class="popup">
        <div id="create" class="create-page-wrapper col-md-offset-1 col-md-3 margin-right jumbotron">
            <div>
                <a href="#close">X</a>
                <h2 class="title text-uppercase text-center">create page</h2>
                {{Form::text('page-name','',['placeholder'=>'page name','class'=>'col-md-12'])}}
                {{Form::submit('add',['class'=>'text-uppercase center-block btn-info btn-lg create-btn','required'=>'required'])}}
            </div>
        </div>
        <div id="edit" class="edit-page-wrapper col-md-3 jumbotron margin-right">
            <div>
                <a href="#close">X</a>
                <h2 class="title text-uppercase text-center">edit page</h2>
                {{Form::select('page-selection',[''=>'select page'],[],['class'=>'col-md-12' ,'required'=>'required'])}}
                {{Form::submit('edit',['class'=>'text-uppercase center-block btn-info btn-lg edit-btn'])}}
            </div>
        </div>
        <div id="delete" class="delete-page-wrapper col-md-3 jumbotron margin-right">
            <div>
                <h2 class="title text-uppercase text-center">delete page</h2>
                <a href="#close">X</a>
                {{Form::select('page-selection',[''=>'select page'],[],['class'=>'col-md-12','required'=>'required'])}}
                {{Form::submit('delete',['class'=>'text-uppercase center-block btn-info btn-lg delete-btn'])}}
            </div>
        </div>
    </div>

@stop


@section('bottom-scripts')

    <script>

        $('input[class$=btn]').on('click', function (e) {
            e.preventDefault();
            window.location.assign('/cms/page-management/create');
        })


    </script>

@stop