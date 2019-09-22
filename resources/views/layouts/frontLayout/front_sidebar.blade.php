<?php
use App\User;
$datingCount = User::datingProfileExists(Auth::user()['id']);
if($datingCount == 1){
    $datingCountText = "My Dating Profile";
} else {
    $datingCountText = "Add Dating Profile";
}
?>
<div id="left_container">

    @if(empty(Auth::check()))

    <div class="partner_search">
        <h2>Member Login</h2>
        <div class="form_container">
            @if(Session::has('flash_message_error'))
                <div class="alert alert-error alert-block">
                    <button type="button" class="close" data-dismiss="alert">
                        <strong>{!! session('flash_message_error') !!}</strong>
                    </button>
                </div>
                @endif
            <form action="{{ route('user_login') }}" method="post">
                @csrf
                <fieldset>
                    <div class="search_row">
                        <div class="search_column_1">
                            <label>username</label>
                        </div>
                        <div class="search_column_2">
                            <input type="text" id="username" name="username" placeholder="username" required>
                        </div>
                    </div>
                    <div class="search_row">
                        <div class="search_column_1">
                            <label>password</label>
                        </div>
                        <div class="search_column_2">
                            <input type="password" id="password" name="password" placeholder="password" required>
                        </div>
                    </div>


                    <div class="search_row last">
                        <div class="search_column_1">&nbsp;</div>
                        <div class="search_column_2">
                            <input type="submit" value="Login" style="background-color: #532D1A; color: #fff; width: 70px; border: none; padding: 5px">
                        </div>
                    </div>

                    <div class="search_row last">
                        <div class="search_column_1">&nbsp;</div>
                        <div class="search_column_2">
                            <h3><a href="{{route('user_register')}}">New User Register</a></h3>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>

    </div>

    @else
        <div class="partner_search">
            <h2>   Welcome <?php echo Auth::user()->name ?>
            </h2>
            <div class="form_container">
                <div class="link_detail">
                    <p class="link">
                        <a href="{{route('step2')}}">{{$datingCountText}}</a>
                    </p>
                    @if($datingCount == 1)
                    <p class="link">
                        <a href="{{route('step3')}}">My Photos</a>
                    </p>
                    @endif
                    <p class="link">
                        <a href="{{route('user_logout')}}">Logout</a>
                    </p>
                </div>
            </div>
        </div>
    @endif

    <div class="partner_search">
        <h2>partner search</h2>
        <div class="form_container">
            <form action="#" method="get">
                <fieldset>
                    <div class="search_row">
                        <div class="search_column_1">
                            <label>I am a</label>
                        </div>
                        <div class="search_column_2">
                            <select class="gender">
                                <option>Male</option>
                            </select>
                            <label class="seeking">Seeking a</label>
                            <select class="gender">
                                <option>Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="search_row">
                        <div class="search_column_1">
                            <label>Looking for a</label>
                        </div>
                        <div class="search_column_2">
                            <select class="date">
                                <option>Date</option>
                            </select>
                        </div>
                    </div>
                    <div class="search_row">
                        <div class="search_column_1">
                            <label>I was born</label>
                        </div>
                        <div class="search_column_2">
                            <select class="dob">
                                <option>Month</option>
                            </select>
                            <select class="dob">
                                <option>Date</option>
                            </select>
                            <select class="dob">
                                <option>Year</option>
                            </select>
                        </div>
                    </div>
                    <div class="search_row">
                        <div class="search_column_1">
                            <label>By Profile ID</label>
                        </div>
                        <div class="search_column_2">
                            <input type="text" name="" value="" />
                            <label class="check">With Photo</label>
                            <input type="checkbox" name="" value="" class="checkbox"/>
                        </div>
                    </div>
                    <div class="search_row last">
                        <div class="search_column_1">&nbsp;</div>
                        <div class="search_column_2">
                            <input type="image" src="{{asset('images/frontend_images/search_btn.gif')}}" class="search_btn"/>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
    <div class="dating_news">
        <h2>dating news </h2>
        <div class="news_detail">
            <p class="date">18th January, ‘09</p>
            <p class="detail">Nunc viverra. Aliquam suscipit egestas turpis. Aenean mollis est. Sed feugiat, nulla sit amet dictum aliquam, massa leo elementum risus, sed gravida felis erat ut libero. Integer sem nisi, adipiscing non, sagittis eget, hendrerit non, nisi. Aliquam ante.</p>
            <p class="know_more"><a href="#">know more...</a></p>
        </div>
        <div class="news_detail">
            <p class="date">20th January, ‘09</p>
            <p class="detail">Fusce tristique, nisl vel gravida venenatis, risus magna eleifend pede, id bibendum mauris metus et erat. Morbi in leo. Quisque sollicitudin sagittis est. Aliquam non nulla. Suspendisse et nulla nec augue mattis venenatis. Lorem ipsum dolor sit amet.</p>
            <p class="know_more"><a href="#">know more...</a></p>
        </div>
        <div class="news_detail">
            <p class="date">25th January, ‘09</p>
            <p class="detail">Fusce tristique, nisl vel gravida venenatis, risus magna eleifend pede, id bibendum mauris metus et erat. Morbi in leo. Quisque sollicitudin sagittis est. Aliquam non nulla. Suspendisse et nulla nec augue mattis venenatis. Lorem ipsum dolor sit amet.</p>
            <p class="know_more"><a href="#">know more...</a></p>
        </div>
    </div>
    <div class="dont_stay"> <img src="{{asset('images/frontend_images/dont_stay_alone.gif')}}" alt="" /></div>
</div>