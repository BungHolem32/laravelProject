@extends('_crm._layout._html')

@section('title','register now')


@section('header')

    <div class="container cms-register-header-wrapper">
        <h2 class="register-header text-uppercase padding-left">
            <strong>please fill all the fields:</strong>
        </h2>
    </div>

@stop

@section('content')

    <div class="cms-register-wrapper container">
        {!! Form::open(array('url'=>route('register-page'),'class'=>'form-register')) !!}

        <div class="part-1 col-xs-6">
            <div class="form-group email">
                {!! Form::label('email','email address',['class'=>'text-uppercase']) !!}
                {!! Form::text('email','',array('class'=>'form-control','name'=>'user[email]','required' => 'required' )) !!}
            </div>

            <div class="form-group firstName">
                {!! Form::label('fName','first name',['class'=>'text-uppercase']) !!}
                {!! Form::text('fName','',array('class'=>'form-control','name'=>'user[fName]','required' => 'required' )) !!}
            </div>
            <div class="form-group lastName">
                {!! Form::label('lName','last name',['class'=>'text-uppercase']) !!}
                {!! Form::text('lName','',array('class'=>'form-control','name'=>'user[lName]','required' => 'required' )) !!}
            </div>
            <div class="form-group address">
                {!! Form::label('address','address',['class'=>'text-uppercase']) !!}
                {!! Form::text('address','',array('class'=>'form-control','name'=>'user[address]','required' => 'required' )) !!}
            </div>
        </div>
        <div class="part-2 col-xs-6">
            <div class="form-group city">
                {!! Form::label('city','city',['class'=>'text-uppercase']) !!}
                {!! Form::text('city','',array('class'=>'form-control','name'=>'user[city]','required' => 'required' )) !!}
            </div>
            <div class="form-group country">
                {!! Form::label('country','county',['class'=>'text-uppercase']) !!}
                {!! Form::text('country','',array('class'=>'form-control','name'=>'user[country]','required' => 'required' )) !!}
            </div>

            <div class="form-group user-name">
                {!! Form::label('userName','user name',['class'=>'text-uppercase']) !!}
                {!! Form::text('userName','',array('class'=>'form-control','name'=>'user[userName]','required' => 'required' )) !!}
            </div>
            <div class="form-group createAt">
                {!! Form::label('createdAt','createAt',['class'=>'text-uppercase sr-only']) !!}
                {!! Form::hidden('createdAt','',array('class'=>'form-control','name'=>'user[createdAt]','required' => 'required','type'=>'hidden' )) !!}
            </div>
            <div class="form-group isMember">
                {!! Form::label('isMember','isMember',['class'=>'text-uppercase sr-only']) !!}
                {!! Form::hidden('isMember','',array('class'=>'form-control','name'=>'user[isMember]','required' => 'required', 'type'=>'hidden')) !!}
            </div>
            <div class="form-group password">
                {!! Form::label('password','password',['class'=>'text-uppercase']) !!}
                {!! Form::password('password',array('class'=>'form-control','name'=>'user[password]','required' => 'required')) !!}
            </div>
        </div>
        <div class="form-group submit">
            {!! Form::submit('Register Now!',['class'=>'text-uppercase register-btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>

@stop