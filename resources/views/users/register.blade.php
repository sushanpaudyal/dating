@extends('layouts.frontLayout.front_design')

@section('content')
    <div id="right_container">
        <div style="padding:20px 15px 30px 15px;">
            <h1>New User Registration</h1>
            <div> <strong> <br />
                    Register for free by filling out the form below:-
                </strong>
            <div> <br />
                <h6 class="inner">Register Here:</h6>
                <br />
                <form action="{{route('user_register')}}" method="post" id="signupForm">
                    @csrf
                    <table width="80%">
                        <tr>
                            <td align="left" valign="top" class="body" ><strong> Name:</strong></td>
                            <td align="left" valign="top"><input name="name" id="name" type="text" size="22" /></td>
                        </tr>
                        <tr>
                            <td align="left" valign="top" class="body" ><strong> Email: </strong></td>
                            <td align="left" valign="top"><input name="email" id="email" type="email" size="22" /></td>
                        </tr>
                        <tr>
                            <td align="left" valign="top" class="body"><strong> Password: </strong></td>
                            <td align="left" valign="top"><input name="password" id="password" type="password" size="22" />
                                <span id="passstrength"></span></td>
                        </tr>
                        <tr>
                            <td align="left" valign="top" class="body"><strong> Confirm Password: </strong></td>
                            <td align="left" valign="top"><input name="confirm_password" id="confirm_password" type="password" size="22" /></td>
                        </tr>
                        <tr>
                            <td align="left" valign="top" class="body" ><strong> Please agree to our Policy:</strong></td>
                            <td align="left" valign="top"><input type="checkbox" class="checkbox" id="agree" name="agree" id="agree" size="22"></td>
                        </tr>

                        <tr>
                            <td align="left" valign="top" class="body" ><strong> Captcha</strong></td>
                            <td align="left" valign="top">{!! app('captcha')->display() !!}</td>
                            @if ($errors->has('g-recaptcha-response'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                            @endif
                        </tr>

                        <tr>
                            <td></td>
                            <td><input type="submit" class="button" value="Register Now" /></td>
                        </tr>


                    </table>
                </form>
            </div>
            <div>
        </div>

        <div class="clear"></div>
    </div>

@endsection