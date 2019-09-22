@extends('layouts.frontLayout.front_design')

@section('content')

    <div id="right_container">
        <div style="padding:20px 15px 30px 15px;">
            <h1>{{$userDetails->name}}</h1>
            @foreach($userDetails->photos as $key => $photo)
                @if($photo->default_photo == "Yes")
                    <?php $user_photo = $userDetails->photos[$key]->photo; ?>
                @else
                    <?php $user_photo = $userDetails->photos[0]->photo; ?>
                @endif
            @endforeach
            <div>
                <img src="{{asset('images/frontend_images/photos/'.$user_photo)}}" alt="" width="177" height="117" class="aboutus-img" />
               <div>
                   Profile ID : {{$userDetails->username}} <br>
                   Name : {{$userDetails->name}} <br>
                   Gender: {{$userDetails->details->gender}} <br>
                   Maritial Status: {{$userDetails->details->maritial_status}} <br>
                   Age:  <?php
                   $dob = $userDetails->details->dob;
                   echo $diff = date('Y') - date('Y', strtotime($dob));
                   ?> Years <br>
                   Height : {{$userDetails->details->height}} <br>
                   Languages: {{$userDetails->details->languages}}
               </div>


                <br>
                <br />
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <div>
                <h6 class="inner">Education & Carrer</h6>
                <div>
                    <strong>Highest Education: </strong>  {{$userDetails->details->education}} <br>
                    <strong>Occupation: </strong>  {{$userDetails->details->occupation}} <br>
                    <strong>Income: </strong>  {{$userDetails->details->income}}


                </div>
            </div>
            <div class="clear"></div>
            <div class="aboutcolumnzone">
                <div class="aboutcolumn1">
                    <div>@extends('layouts.frontLayout.front_design')
                        @section('content')
                            <div id="right_container">
                                <div style="padding:20px 15px 30px 15px;">
                                    <h1>{{ $userDetails->name }}</h1>
                                    @foreach($userDetails->photos as $key => $photo)
                                        @if($photo->default_photo == "Yes")
                                            <?php $user_photo = $userDetails->photos[$key]->photo; ?>
                                        @else
                                            <?php $user_photo = $userDetails->photos[0]->photo; ?>
                                        @endif
                                    @endforeach
                                    <div>
                                        @if(!empty($user_photo))
                                            <img src="{{ asset('images/frontend_images/photos/'.$user_photo) }}" alt="" width="210" class="aboutus-img" />
                                        @else
                                            <img src="{{ asset('images/frontend_images/photos/default.jpg') }}" alt="" width="210" class="aboutus-img" />
                                        @endif
                                        <strong>Profile ID:</strong> {{ $userDetails->username }}<br>
                                        <strong>Name:</strong> {{ $userDetails->name }}<br>
                                        <strong>Gender:</strong> {{ $userDetails->details->gender }}<br>
                                        <strong>Marital Status:</strong> {{ $userDetails->details->marital_status }}<br>
                                        <strong>Age:</strong> <?php
                                        echo $diff = date('Y') - date('Y',strtotime($userDetails->details->dob));
                                        ?> Yrs.<br>
                                        <strong>Height:</strong> {{ $userDetails->details->height }}<br>
                                        <strong>Body Type:</strong> {{ $userDetails->details->body_type }}<br>
                                        <strong>Complexion:</strong> {{ $userDetails->details->complexion }}<br>
                                        <strong>Languages:</strong> {{ $userDetails->details->languages }}<br>
                                        <strong>Hobbies:</strong> {{ $userDetails->details->hobbies }}<br>
                                        <strong>City:</strong> {{ $userDetails->details->city }}<br>
                                        <strong>State:</strong> {{ $userDetails->details->state }}<br>
                                        <strong>Country:</strong> {{ $userDetails->details->country }}<br>

                                        <br />
                                        <br />
                                        <div class="clear"></div>
                                    </div>
                                    <div class="clear"></div>
                                    <div>
                                        <h6 class="inner">Education & Career</h6>
                                        <div>
                                            <strong>Highest Education:</strong> {{ $userDetails->details->hobbies }}<br>
                                            <strong>Occupation:</strong> {{ $userDetails->details->hobbies }}<br>
                                            <strong>Income:</strong> {{ $userDetails->details->hobbies }}<br>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="aboutcolumnzone">
                                        <div class="aboutcolumn1">
                                            <div>
                                                <h5 class="inner">About Myself</h5>
                                                <div>{{ $userDetails->details->about_myself }}</div>
                                            </div>
                                        </div>
                                        <div class="aboutcolumn2">
                                            <div>
                                                <h5 class="inner">About My Preferred Partner</h5>
                                                <div>{{ $userDetails->details->about_partner }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endsection
                        <h5 class="inner">About Myself</h5>
                        <img src="images/ico-med-1.png" alt="" class="abouticon" />
                        {{$userDetails->details->about_myself}}
                    </div>
                </div>
                <div class="aboutcolumn2">
                    <div>
                        <h5 class="inner">About Partner</h5>
                        <img src="images/ico-med-2.png" alt="" class="abouticon" />
                        {{$userDetails->details->about_partner}}

                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection