@extends('cms.layout.htmls._html-unconnected')

@section('title','register now')


@section('header')

    <div class="container cms-register-header-wrapper">
        <h2 class="register-header text-uppercase padding-left">
            <strong>fill out your information:</strong>
        </h2>
    </div>

@stop

@section('content')

    <div class="cms-register-wrapper container">
        {!! Form::open(array('url'=>route('register-page'),'class'=>'form-register')) !!}

        <div class="part-1 col-xs-6">
            <div class="form-group email">
                {!! Form::label('email','email address',['class'=>'text-uppercase sr-only']) !!}
                {!! Form::text('email','',array('class'=>'form-control','placeholder'=>'email-address:','name'=>'user[email]','required' => 'required' )) !!}
            </div>

            <div class="form-group firstName">
                {!! Form::label('fName','first name',['class'=>'text-uppercase sr-only']) !!}
                {!! Form::text('fName','',array('class'=>'form-control','placeholder'=>'first name:','name'=>'user[fName]','required' => 'required' )) !!}
            </div>
            <div class="form-group lastName">
                {!! Form::label('lName','last name',['class'=>'text-uppercase sr-only']) !!}
                {!! Form::text('lName','',array('class'=>'form-control','placeholder'=>'last name:','name'=>'user[lName]','required' => 'required' )) !!}
            </div>
            <div class="form-group address">
                {!! Form::label('address','address',['class'=>'text-uppercase sr-only']) !!}
                {!! Form::text('address','',array('class'=>'form-control','placeholder'=>'address:','name'=>'user[address]','required' => 'required' )) !!}
            </div>
        </div>
        <div class="part-2 col-xs-6">
            <div class="form-group city">
                {!! Form::label('city','city',['class'=>'text-uppercase sr-only']) !!}
                {!! Form::text('city','',array('class'=>'form-control ','placeholder'=>'city:','name'=>'user[city]','required' => 'required' )) !!}
            </div>
            <div class="form-group country">
                {!! Form::label('country','county',['class'=>'text-uppercase sr-only']) !!}
                {!! Form::text('country','',array('class'=>'form-control ','placeholder'=>'country:','name'=>'user[country]','required' => 'required' )) !!}
            </div>

            <div class="form-group user-name">
                {!! Form::label('userName','user name',['class'=>'text-uppercase sr-only']) !!}
                {!! Form::text('userName','',array('class'=>'form-control ','placeholder'=>'user name:','name'=>'user[userName]','required' => 'required' )) !!}
            </div>
            <div class="form-group createAt">
                {!! Form::label('createdAt','createAt',['class'=>'text-uppercase sr-only sr-only']) !!}
                {!! Form::hidden('createdAt','',array('class'=>'form-control ','placeholder'=>'createAt:','name'=>'user[createdAt]','required' => 'required','type'=>'hidden' )) !!}
            </div>
            <div class="form-group isMember">
                {!! Form::label('isMember','isMember',['class'=>'text-uppercase sr-only sr-only']) !!}
                {!! Form::hidden('isMember','',array('class'=>'form-control ','placeholder'=>'isMember:','name'=>'user[isMember]','required' => 'required', 'type'=>'hidden')) !!}
            </div>
            <div class="form-group password">
                {!! Form::label('password','password',['class'=>'text-uppercase sr-only']) !!}
                {!! Form::password('password',array('class'=>'form-control ','placeholder'=>'password:','name'=>'user[password]','required' => 'required')) !!}
            </div>
        </div>
        <div class="form-group submit col-md-12">
            {!! Form::submit('Register Now!',['class'=>'text-uppercase  register-btn btn-info']) !!}
        </div>

        {!! Form::close() !!}
    </div>

@stop