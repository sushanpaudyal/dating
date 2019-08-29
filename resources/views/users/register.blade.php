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
                <form action="{{route('user_register')}}" method="post">
                    @csrf
                    <table width="80%">
                        <tr>
                            <td align="left" valign="top" class="body" id="Contact"><strong> Name:</strong></td>
                            <td align="left" valign="top"><input name="name" type="text" size="40" /></td>
                        </tr>
                        <tr>
                            <td align="left" valign="top" class="body" id="Email"><strong> Email: </strong></td>
                            <td align="left" valign="top"><input name="email" type="email" size="40" /></td>
                        </tr>
                        <tr>
                            <td align="left" valign="top" class="body" id="Email"><strong> Password: </strong></td>
                            <td align="left" valign="top"><input name="password" type="password" size="40" /></td>
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