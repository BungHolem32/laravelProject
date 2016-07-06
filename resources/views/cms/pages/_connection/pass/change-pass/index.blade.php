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

        <div class="feedback-wrapper">
            <h2 class="text-center feedback defaultFontStyle"></h2>
        </div>
    </div>




@stop

d
@section('bottom-scripts')

    {{--CHANGE PASSWORD CALL --}}
    <script class="ajax-call-change-password">
        $('.submit-btn').on('click', function (e) {

            e.preventDefault();
            var currentPassword = $('.newPass').val();
            var validationPassword = $('.repeatPass').val();
            var email = '{{$userInfo['email']}}';

            if (currentPassword == validationPassword) {
                $('.feedback').text('');

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
                        $('.submit-btn').val('ClickMe');
                        $('.wait').hide();
                        var response = data.responseText;

                        if (response == 'alreadyExist') {
                            $('.feedback').text('your password already used before , please create new one!');
                            return;
                        }


                        if ((response) == 'PasswordChanged') {
                            $('.feedback').text('your password been update successfully');
                            setTimeout(function () {
                                window.location.assign('{{url('cms/login')}}')
                            }, 5000);

                        }
                    }
                });

            } else {
                $('.feedback').text('both fields must be the same!');
                return false;
            }
        });


    </script>

@stop