@extends('cms.layout._html')
@section('title','cms dashboard')

@section('header')
    <h2 class="header-title">Welcome to CMS </h2>
    <div class="clearfix"></div>
@stop

@section('content')

    @if(session('feedback'))
        {{session('feedback')}}
    @endif
@endsection