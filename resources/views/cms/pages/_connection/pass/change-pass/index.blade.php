@extends('cms.layout.htmls._html-unconnected')

@section('header')
    <div class="cms-header-forgot-pass text-center">
        <h2 class="text-uppercase default-style defaultFontStyle">{{ucwords('reset your password')}}</h2>
    </div>
@stop

@section('content')
    <div class="container">
        {{Form::open()}}


        <div class="form-group new-password-wrapper">
            {{Form::password('new-password',['placeholder'=>'new password','class'=>'form-control newPass','required'=>"required"])}}
        </div>

        <div class="form-group repeat-password-wrapper">
            {{Form::password('repeat-password',['placeholder'=>'repeat password','class'=>'form-control repeatPass','required'=>"required"])}}
        </div>
        <div class="form-group submit-btn-wrapper">
            {{Form::submit('clickMe',['class'=>'form-control btn-info submit-btn text-uppercase'])}}
            <div class="wait text-center defaultFontStyle">
                <i class="fa fa-cog fa-spin fa-3x fa-fw margin-bottom"></i>
            </div>
        </div>
        {{Form::close()}}
    </div>

    <div class="feedback-wrapper">
        <h2 class="text-center feedback defaultFontStyle"></h2>
    </div>
@stop



@section('bottom-scripts')


    <script>
        $('.submit-btn').on('click', function (e) {

            e.preventDefault();
            var currentPassword = $('.newPass').val();
            var validationPassword = $('.repeatPass').val();
            var email = '{{$userInfo['email']}}';

            if (currentPassword == validationPassword) {

                $.ajax({
                    url: '{{url('cms/changePassword/check')}}',
                    type: 'GET',
                    dataType: 'json',
                    data: {password: currentPassword, email: email},
                    beforeSend: function () {
                        $('.submit-btn').val('');
                        $('.wait').show();
                    },

                    complete: function (data) {
                        console.log(data);
                        $('.submit-btn').val('ClickMe');
                        $('.wait').hide();
                    }
                });

            } else {
                $('.feedback').text('both fields must be the same!');
                return false;
            }
        });


    </script>

@stop