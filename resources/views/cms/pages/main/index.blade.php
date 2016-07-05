@extends('cms.layout.htmls._html-connected')
@section('title','cms dashboard')

@section('header')
    <h2 class="header-title text-uppercase">Welcome to CMS </h2>
    <div class="clearfix"></div>
@stop

@section('content')

    @if(session('feedback'))
        {{session('feedback')}}
    @endif
@endsection