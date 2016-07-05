@extends('cms.layout.htmls._html-unconnected')

@section('content')
    <div class="container">
        {{Form::open()}}

        <div class="form-group">
            {{Form::password('current-password','',['placeholder'=>'current password','class'=>'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::password('new-password','',['placeholder'=>'current password','class'=>'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::password('repeat-password','',[],['placeholder'=>'current password','class'=>'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::submit('clickMe',['class'=>'form-control'])}}
        </div>
        {{Form::close()}}
    </div>


@stop