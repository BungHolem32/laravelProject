@extends('_crm._layout._html')

@section('nav-bar')
    @include('_crm._partials.nav-bar-crm')
@stop

@section('header')
    <h2 class="header-dashboard-title">Welcome to CMS </h2>
    <div class="clearfix"></div>
@stop

@section('content')
    @if(session('feedback'))
        {{session('feedback')}}
    @endif
@endsection