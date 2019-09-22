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
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin sed odio et ante adipiscing lobortis. Quisque eleifend, arcu a dictum varius, risus neque venenatis arcu, a semper massa mi eget ipsum.<br />
                <br />
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin sed odio et ante adipiscing lobortis. Quisqueeleifend, arcu a dictum varius, risus neque venenatis arcu, a semper massa mi eget ipsum. Proin sed odio et ante adipiscing lobortis. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin sed odio et ante adipiscing lobortis. Quisque eleifend, arcu a dictum varius, risus neque venenatis arcu, a semper massa mi eget ipsum. Proin sed odio et ante adipiscing lobortis. <br />
                <br />
                <br />
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <div>
                <h6 class="inner">Our Values</h6>
                <div>Quisque eleifend, arcu a dictum varius, risus neque venenatis arcu, a semper massa mi eget ipsum. Proin sed odio et ante adipiscing lobortis. Proin sed odio et ante adipiscing lobortis. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin sed odio et ante adipiscing lobortis.</div>
            </div>
            <div class="clear"></div>
            <div class="aboutcolumnzone">
                <div class="aboutcolumn1">
                    <div>
                        <h5 class="inner">Customer Service</h5>
                        <img src="images/ico-med-1.png" alt="" class="abouticon" /> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin sed odio et ante adipiscing lobortis. Quisque eleifend, arcu a dictum varius,
                        <div class="insidereadmore"><a href="#">Read More...</a></div>
                    </div>
                </div>
                <div class="aboutcolumn2">
                    <div>
                        <h5 class="inner">Award Winning</h5>
                        <img src="images/ico-med-2.png" alt="" class="abouticon" /> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin sed odio et ante adipiscing lobortis. Quisque eleifend, arcu a dictum varius,
                        <div class="insidereadmore"><a href="#">Read More...</a></div>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="aboutcolumn1">
                    <div>
                        <h5 class="inner">Global Reach</h5>
                        <img src="images/ico-med-3.png" alt="" class="abouticon" /> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin sed odio et ante adipiscing lobortis. Quisque eleifend, arcu a dictum varius,
                        <div class="insidereadmore"><a href="#">Read More...</a></div>
                    </div>
                </div>
                <div class="aboutcolumn2">
                    <div>
                        <h5 class="inner">Availability</h5>
                        <img src="images/ico-med-4.png" alt="" class="abouticon" /> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin sed odio et ante adipiscing lobortis. Quisque eleifend, arcu a dictum varius,
                        <div class="insidereadmore"><a href="#">Read More...</a></div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <div>
                <h6 class="inner">Our Commitment</h6>
                <div> Quisque eleifend, arcu a dictum varius, risus neque venenatis arcu, a semper massa mi eget ipsum. Proin sed odio et ante adipiscing lobortis. Proin sed odio et ante adipiscing lobortis. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin sed odio et ante adipiscing lobortis. </div>
            </div>
        </div>
    </div>

@endsection