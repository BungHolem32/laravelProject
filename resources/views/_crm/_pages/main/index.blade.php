@extends('_crm._layout._html')
@section('title','cms dashboard')
@section('nav-bar')
    @include('_crm._partials.nav-bar-crm')
@stop

@section('header')
    <h2 class="header-dashboard-title">Welcome to CMS </h2>
    <div class="clearfix"></div>
@stop

@section('content')
    <section class="user-info-wrapper container">
        <div class="user-info">
            <header>
                <h1 class="text-uppercase">{{session('userInfo.fName').' '. session('userInfo.lName')}}</h1>
            </header>
            <div class="content">
                <h4 class="user-role text-capitalize"><strong>role:</strong> admin</h4>
                <h4 class="user-email text-capitalize"><strong>email: </strong> {{session('userInfo.email')}}</h4>
                <h4 class="status text-capitalize"><strong>status:</strong> approved </h4>
                <h3 class="log-out pull-right text-uppercase"><a href="{{route('logout')}}">log-out</a></h3>
            </div>

        </div>
    </section>
    <div class="clearfix"></div>



    @if(session('feedback'))
        {{session('feedback')}}
    @endif
@endsection