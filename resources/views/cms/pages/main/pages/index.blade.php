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

            <a href="#create-popup" class="create-link text-uppercase col-md-4 text-center link defaultFontStyle">create
                page</a>
            <a href="#edit-popup" class="edit-link text-uppercase col-md-4 text-center link defaultFontStyle">edit page</a>
            <a href="#delete-popup" class="delete-link text-uppercase col-md-4 text-center link defaultFontStyle">delete
                page</a>
        </div>
    </div>

    {{--CREATE PAGE--}}

    @include('pages._partials._create-pop-up')
    @include('pages.content.default.edit')




    {{--EDIT PAGE--}}
    <div id="edit" class="edit-page-wrapper col-md-3 jumbotron margin-right">
        @include('pages.content.default.edit')
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
                <div class="form-group">
                    {{Form::select('page-selection',[''=>'select page'],[],['class'=>'col-md-12 form-control','required'=>'required'])}}
                </div>
                <div class="form-group">
                    {{Form::submit('delete',['class'=>'text-uppercase center-block btn-info btn-lg delete-btn form-control'])}}
                </div>
                {{Form::close()}}
            </div>

        </div>
    </div>

@stop


@section('bottom-scripts')

    <script>

        (function () {
            var pageManagement = {};

            Object.defineProperties(pageManagement, {
                init: {
                    value: function () {

                    },
                    enumerable: true,
                    configurable: true
                },
                changeColorByValue: {
                    value: function () {
                        $('input').on('keyup', function () {
                            var inputs = $('input[type="text"],textarea');
                            for (index in inputs) {
                                if ($(inputs[index]).val() != '') {
                                    $(inputs[index]).css('border', '1px solid green');
                                }
                                else {
                                    $(inputs[index]).css('border', '1px solid red');
                                }
                            }

                        })
                    }
                }
            });
//            pageManagement.changeColorByValue();
        })();


        $('.create-btn').on('click', function (e) {
            e.preventDefault();
            $('.content-info').slideToggle('easing');
        })

        $('.createNewPageFirstStep').on('click', function () {
            var url = $('.url').val().toLowerCase();
            url = url.replace(' ', '-');
            var name = $('.name').val();


            $('.friendlyUrl').val(url);
            $('.pageName').val(name);
        })


    </script>

@stop