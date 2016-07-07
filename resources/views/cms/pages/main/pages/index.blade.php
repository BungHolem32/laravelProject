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

            <a href="#create" class="create-link text-uppercase col-md-4 text-center link defaultFontStyle">create
                page</a>
            <a href="#edit" class="edit-link text-uppercase col-md-4 text-center link defaultFontStyle">edit page</a>
            <a href="#delete" class="delete-link text-uppercase col-md-4 text-center link defaultFontStyle">delete
                page</a>
        </div>
    </div>




    {{--CREATE PAGE--}}
    <div id="create" class="create-page-wrapper col-md-offset-1 col-md-3 margin-right jumbotron">

        <div class="create-content-wrapper">
            <a href="#close" class="close-btn">
                <i class="fa fa-times" aria-hidden="true"></i>
            </a>

            <h2 class="title text-uppercase text-center">create page</h2>
            <div class="form">
                {{Form::open()}}
                {{Form::text('page-name','',['placeholder'=>'page name','class'=>'col-md-12'])}}
                {{Form::submit('add',['class'=>'text-uppercase center-block btn-info btn-lg create-btn','required'=>'required'])}}
                {{Form::close()}}

                <a href="#info-create" class="info-btn">create</a>

                <div id="info-create" class="content-info">
                    <a href="close">X</a>
                    <form action="">
                        <div class="part-1 col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="part-2 col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </form>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>


    {{--EDIT PAGE--}}
    <div id="edit" class="edit-page-wrapper col-md-3 jumbotron margin-right">
        <div class="create-content-wrapper">
            <a href="#close" class="close-btn">
                <i class="fa fa-times" aria-hidden="true"></i>
            </a>

            <h2 class="title text-uppercase text-center">edit page</h2>
            <div class="form">
                {{Form::open()}}
                {{Form::select('page-selection',[''=>'select page'],[],['class'=>'col-md-12' ,'required'=>'required'])}}
                {{Form::submit('edit',['class'=>'text-uppercase center-block btn-info btn-lg edit-btn'])}}
                {{Form::close()}}
            </div>
        </div>
    </div>


    {{--DELETE PAGE--}}
    <div id="delete" class="delete-page-wrapper col-md-3 jumbotron margin-right">
        <div class="create-content-wrapper">

            <a href="#close" class="close-btn">
                <i class="fa fa-times" aria-hidden="true"></i>
            </a>
            <h2 class="title text-uppercase text-center">delete page</h2>
            <div class="form">
                {{Form::open()}}
                {{Form::select('page-selection',[''=>'select page'],[],['class'=>'col-md-12','required'=>'required'])}}
                {{Form::submit('delete',['class'=>'text-uppercase center-block btn-info btn-lg delete-btn'])}}
                {{Form::close()}}
            </div>

        </div>
    </div>

@stop


@section('bottom-scripts')

    <script>

//        $('input[class$=btn]').on('click', function (e) {
//            e.preventDefault();
//            window.location.assign('/cms/page-management/create');
//        })

        $('.create-btn').on('click',function(e){
            e.preventDefault();
            $('.content-info').slideToggle('easingd');
        })


    </script>

@stop