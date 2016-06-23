@extends('_cms._layout._html')

<div class="cms-login-wrapper container">

    <h2 class="cms-form-title text-capitalize">admin login</h2>
    {!! Form::open(['class'=>'login-form form-default']) !!}

    {{--EMAIL INPUT--}}
    <div class="form-group email-field ">
        {!! Form::label('email','email:',['class'=>'text-capitalize']) !!}
        {!! Form::text('email','',['class'=>'form-control','name'=>'User[email]','required'=>'required']) !!}
    </div>
    <div class="clearfix"></div>

    {{--PASSWORD INPUT--}}
    <div class="form-group password ">
        {!! Form::label('password','password:',['class'=>'text-capitalize']) !!}
        {!! Form::password('',['class'=>'form-control','name'=>'User[password]' ,'required'=>'required']) !!}
    </div>

    <div class="form-group submit">
        {!! Form::submit('Click Me',['name'=>'submit','class'=>'login-button-submit btn-primary btn']) !!}
    </div>

    {!! Form::close()!!}
</div>