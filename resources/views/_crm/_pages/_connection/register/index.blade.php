@extends('_crm._layout._html')

@section('title','register now')


@section('header')

    <div class = "container cms-register-header-wrapper">
        <h2 class = "register-header text-capitalize padding-left">
            <strong>please fill all the fields:</strong>
        </h2>
    </div>

@stop

@section('content')

    <div class = "cms-register-wrapper container">
        {!! Form::open(array('url'=>route('register-page'),'class'=>'form-register')) !!}

        <div class = "form-group firstName">

            {!! Form::label('fname','first name',['class'=>'text-capitalize']) !!}
            {!! Form::text('fname','',array('class'=>'form-control','name'=>'user[fname]','required' => 'required' )) !!}
        </div>
        <div class = "form-group lastName">
            {!! Form::label('lname','last name',['class'=>'text-capitalize']) !!}
            {!! Form::text('lname','',array('class'=>'form-control','name'=>'user[lname]','required' => 'required' )) !!}
        </div>
        <div class = "form-group email">
            {!! Form::label('email','email address',['class'=>'text-capitalize']) !!}
            {!! Form::text('email','',array('class'=>'form-control','name'=>'user[email]','required' => 'required' )) !!}
        </div>
        <div class = "form-group country">
            {!! Form::label('country','county',['class'=>'text-capitalize']) !!}
            {!! Form::text('country','',array('class'=>'form-control','name'=>'user[country]','required' => 'required' )) !!}
        </div>
        <div class = "form-group city">
            {!! Form::label('city','city',['class'=>'text-capitalize']) !!}
            {!! Form::text('city','',array('class'=>'form-control','name'=>'user[city]','required' => 'required' )) !!}
        </div>
        <div class = "form-group address">
            {!! Form::label('address','address',['class'=>'text-capitalize']) !!}
            {!! Form::text('address','',array('class'=>'form-control','name'=>'user[address]','required' => 'required' )) !!}
        </div>

        <div class = "form-group submit">
            {!! Form::submit('Register Now!',['class'=>'text-uppercase register-btn']) !!}
        </div>

        {!! Form::close() !!}
    </div>

@stop