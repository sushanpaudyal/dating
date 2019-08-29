<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Love Story</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="csrf_token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{asset('css/frontend_css/layout.css')}}">
    <script src="{{asset('js/frontend_js/jquery.js')}}"></script>
    <script src="{{asset('js/frontend_js/jquery-3.1.1.js')}}"></script>
    <script src="{{asset('js/frontend_js/jquery.validate.js')}}"></script>
    <script src="{{asset('js/frontend_js/additional-methods.js')}}"></script>
    <script src="{{asset('js/frontend_js/main.js')}}"></script>




</head>
<body>
<div id="layout">
    <div class="layout_inner">
        <div id="body_container">

            @include('layouts.frontLayout.front_header')


            @include('layouts.frontLayout.front_sidebar')

            @yield('content')
        </div>
    </div>

    @include('layouts.frontLayout.front_footer')

</div>
</body>
</html>
