@extends('cms.layout.htmls._html-unconnected')

@section('title',ucwords('login page'))

@section('bottom-scripts')
    <script src="/js/libs/validate.min.js"></script>
@stop

@section('content')

    <div class="cms-login-wrapper container">

        <h2 class="form-title text-uppercase defaultFontStyle">cms login</h2>
        {!! Form::open(['class'=>'login-form form-default']) !!}

        {{--EMAIL INPUT--}}
        <div class="form-group email-field">
            {!! Form::label('email','email:',['class'=>'text-capitalize sr-only']) !!}
            {!! Form::text('email','',['class'=>'form-control','name'=>'User[email]','required'=>'required','placeholder'=>'enter email']) !!}
        </div>
        <div class="clearfix"></div>

        {{--PASSWORD INPUT--}}
        <div class="form-group password ">
            {!! Form::label('password','password:',['class'=>'text-capitalize sr-only']) !!}
            {!! Form::password('',['class'=>'form-control','name'=>'User[password]' ,'required'=>'required','placeholder'=>'enter password']) !!}
        </div>

        {{--SUBMIT BUTTON--}}
        <div class="form-group submit">
            {!! Form::submit('enter cms!',['name'=>'submit','class'=>'login-submit btn-info  btn text-uppercase']) !!}
        </div>

        <div class="form-group forgot-password">
            <a href="{{route('forgot-password')}}" class="text-capitalize pull-right defaultFontStyle">forgot
                password?</a>
        </div>

        {{--A REF REGISTER--}}
        <div class="form-group register">
            <a href="{{route('register-page')}}" class="text-capitalize pull-left text-success defaultFontStyle">new
                user? sign now!</a>

        </div>
        {!! Form::close()!!}

    </div>
    <div class="feedback-wrapper defaultFontStyle">
        @if(!empty(Session::get('feedback')))
            <h2 class="text-center feedback">
                {{Session::get('feedback')}}
            </h2>
        @endif
    </div>


@stop