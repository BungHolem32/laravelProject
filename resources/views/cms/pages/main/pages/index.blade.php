@extends('cms.pages.main.index')
@section('title','page managment')
@section('nav-bar')

@stop
@section('header')
    <h2 class="header-title"> Welcome to Page Management</h2>
@stop

@section('content')
    @parent

    <div class="container categories-wrapper">
        <div class="row">
            <div class="create-page-wrapper col-md-offset-1 col-md-3 margin-right jumbotron">
                <h2 class="title text-uppercase text-center">create page</h2>
                {{Form::text('page-name','',['placeholder'=>'page name','class'=>'col-md-12'])}}
                {{Form::submit('add',['class'=>'text-uppercase center-block btn-info btn-lg create-btn','required'=>'required'])}}
            </div>
            <div class="edit-page-wrapper col-md-3 jumbotron margin-right">
                <h2 class="title text-uppercase text-center">edit page</h2>
                {{Form::select('page-selection',[''=>'select page'],[],['class'=>'col-md-12' ,'required'=>'required'])}}
                {{Form::submit('edit',['class'=>'text-uppercase center-block btn-info btn-lg edit-btn'])}}
            </div>
            <div class="delete-page-wrapper col-md-3 jumbotron margin-right">
                <h2 class="title text-uppercase text-center">delete page</h2>
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