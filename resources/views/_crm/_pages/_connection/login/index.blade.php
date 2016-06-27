@extends('_crm._layout._html')
@section('title',ucwords('login page'))
<div class = "cms-login-wrapper container">

    <h2 class = "form-title text-uppercase">cms login</h2>
    {!! Form::open(['class'=>'login-form form-default']) !!}

    {{--EMAIL INPUT--}}
    <div class = "form-group email-field">
        {!! Form::label('email','email:',['class'=>'text-capitalize sr-only']) !!}
        {!! Form::text('email','',['class'=>'form-control','name'=>'User[email]','required'=>'required','placeholder'=>'enter email']) !!}
    </div>
    <div class = "clearfix"></div>

    {{--PASSWORD INPUT--}}
    <div class = "form-group password ">
        {!! Form::label('password','password:',['class'=>'text-capitalize sr-only']) !!}
        {!! Form::password('',['class'=>'form-control','name'=>'User[password]' ,'required'=>'required','placeholder'=>'enter password']) !!}
    </div>

    {{--SUBMIT BUTTON--}}
    <div class = "form-group submit">
        {!! Form::submit('enter cms!',['name'=>'submit','class'=>'login-submit btn-primary  btn text-uppercase']) !!}
    </div>

    <div class="form-group forgot-password">
        <a href = "{{url('/admin/forgot-pass')}}" class = "text-capitalize pull-right">forgot password?</a>
    </div>

    {{--A REF REGISTER--}}
    <div class = "form-group register">
        <a href = "{{url('/admin/register')}}" class = "text-capitalize pull-left text-success">new user? sign now!</a>

    </div>


    {!! Form::close()!!}
</div>
