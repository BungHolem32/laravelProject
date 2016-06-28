@extends('_crm._layout._html')
@section('title',ucwords('forgot password'))

@section('header')
    <div class="container cms-header-forgot-pass text-center">
        <h2>{{ucwords('forgot password')}}</h2>
    </div>
@stop

@section('content')
    <div class="cms-form-wrapper forgot-password-wrapper container">

        {!! Form::open(array('class'=>'form-forgot-password','as'=>'forgot-password','route'=>'forgot-password' )) !!}

        <div class="form-group email-input">
            {!! Form::label('email','email address',['class'=>'text-capitalize sr-only']) !!}
            {!! Form::text('email','',['class'=>'form-control','name'=>'email','required'=>'required','placeholder'=>'email address']) !!}
        </div>
        <div class="form-group submit">
            {!! Form::submit('click me',['class'=>'btn btn-large pull-right submit-btn text-uppercase','name'=>'submit']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@stop

