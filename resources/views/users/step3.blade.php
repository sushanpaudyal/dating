@extends('layouts.frontLayout.front_design')

@section('content')
    <div id="right_container">
        <div style="padding:20px 15px 30px 15px;">
            <h1>My Photos</h1>
            @if(Session::has('flash_message_error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">X</button>
                    <strong class="text-danger">{!! session('flash_message_error') !!}</strong>
                </div>
            @endif

            @if(Session::has('flash_message_success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">X</button>
                    <strong class="text-success">{!! session('flash_message_success') !!}</strong>
                </div>
            @endif
            <div> <strong> <br />
                   You can upload your multiple photos of your choice:
                </strong>
                <div> <br />
                    <h6 class="inner">Upload Photos:</h6>
                    <br />


                    <form action="{{route('step3')}}" method="post" id="photosForm" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <table width="80%" cellpadding="10" cellspacing="10">
                            <tr>
                                <td align="left" valign="top" class="body" ><strong> Photos:</strong></td>
                                <td align="left" valign="top"><input  autocomplete="off" name="photo[]" id="photo" type="file" multiple="multiple" size="22" style="width: 208px; font-size: 14px;" required /></td>
                            </tr>



                            <tr>
                                <td></td>
                                <td><input type="submit" class="button" value="Submit" /></td>
                            </tr>


                        </table>
                    </form>


                </div>
                <div>
                </div>

                <div class="clear"></div>
            </div>

        </div>

        <div class="recent_add_prifile">
            @foreach($user_photos as $user_photo)
            <div class="profile_box first"> <span class="photo">
                        <img src="{{asset('images/frontend_images/photos/'.$user_photo->photo)}}" alt="" />
                </span>
                <p class="left">Status:</p>
                <p class="right">
                    @if($user_photo->status == 1)
                        Active
                        @else
                    InActive
                        @endif
                </p>
                <p>
                    <a href="/delete-photo/{{$user_photo->photo}}" class="btn btn-danger btn-sm" type="button">Delete</a>
                </p>
                <p>&nbsp;</p>

            </div>
                @endforeach
        </div>

@endsection