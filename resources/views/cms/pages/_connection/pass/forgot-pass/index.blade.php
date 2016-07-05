@extends('cms.layout.htmls._html-unconnected')
@section('title',ucwords('forgot password'))

@section('header')
    <div class="cms-header-forgot-pass text-center">
        <h2 class="text-uppercase">{{ucwords('forgot password')}}</h2>
    </div>
@stop

@section('content')

    <div class=" forgot-password-wrapper container">

        {!! Form::open(array('class'=>'form-forgot-password','as'=>'forgot-password','route'=>'forgot-password' )) !!}

        {{ csrf_field() }}
        {{--EMAIL TAG--}}
        <div class="form-group email-input">
            {!! Form::label('email','email address',['class'=>'text-capitalize sr-only']) !!}
            {!! Form::text('email','',['class'=>'form-control','name'=>'email','required'=>'required','placeholder'=>'email address']) !!}
        </div>

        {{--SUBMIT TAG--}}
        <div class="form-group submit">
            {!! Form::submit('click me',['class'=>'btn  pull-right submit-btn text-uppercase btn-info','name'=>'submit']) !!}
        </div>

        {!! Form::close() !!}

        @if(!empty(Session::get('feedback')))
            <h2 class="text-center feedback">
                {{Session::get('feedback')}}
            </h2>
        @endif
    </div>

@stop
