@extends('layouts.adminLayout.admin_design')

@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{route('admin.dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="javascript:" class="current">View Users</a> </div>
            <h1>View All Users</h1>
            @if(Session::has('flash_message_error'))
                <div class="alert alert-error alert-block">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>{!! session('flash_message_error') !!}</strong>
                </div>
            @endif
            @if(Session::has('flash_message_success'))
                <div class="alert alert-su alert-block">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>{!! session('flash_message_success') !!}</strong>
                </div>
            @endif
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5>Users</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">
                                <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Registered On</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->created_at}}</td>
                                        <td>
                                            @if(!empty($user['details']['id']))
                                            <a href="#myModal{{ $user['id'] }}" data-toggle="modal" class="btn btn-success btn-mini">View Details</a>
                                            <div id="myModal{{ $user['id'] }}" class="modal hide">
                                                <div class="modal-header">
                                                    <button data-dismiss="modal" class="close" type="button">×</button>
                                                    <h3>User Details</h3>
                                                    <input class="userStatus" rel="{{ $user['id'] }}" type="checkbox" data-toggle="toggle"  data-on="Enabled" data-off="Disabled" @if($user['details']['status']=="1") checked @endif>
                                                </div>
                                                <div class="modal-body">
                                                    <table width="100%" cellpadding="10" cellspacing="10">
                                                        <tr>
                                                            <td width="40%" align="left" valign="top" class="body"><strong> Date of Birth: </strong></td>
                                                            <td width="60%" align="left" valign="top">{{ $user['details']['dob'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top" class="body"><strong> Gender: </strong></td>
                                                            <td align="left" valign="top">
                                                                {{ $user['details']['gender'] }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top" class="body"><strong> Height: </strong></td>
                                                            <td align="left" valign="top">
                                                                {{ $user['details']['height'] }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top" class="body"><strong> Marital Status: </strong></td>
                                                            <td align="left" valign="top">
                                                                {{ $user['details']['maritial_status'] }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top" class="body"><strong> Body Type: </strong></td>
                                                            <td align="left" valign="top">
                                                                {{ $user['details']['body_type'] }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top" class="body"><strong> City: </strong></td>
                                                            <td align="left" valign="top">{{ $user['details']['city'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top" class="body"><strong> State: </strong></td>
                                                            <td align="left" valign="top">{{ $user['details']['state'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top" class="body"><strong> Country: </strong></td>
                                                            <td align="left" valign="top">
                                                                {{ $user['details']['country'] }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top" class="body"><strong> Languages: </strong></td>
                                                            <td align="left" valign="top">
                                                                {{ $user['details']['languages'] }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top" class="body"><strong> Hobbies: </strong></td>
                                                            <td align="left" valign="top">
                                                                {{ $user['details']['hobbies'] }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                <h6 class="inner">Education & Career</h6>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top" class="body"><strong> Highest Education: </strong></td>
                                                            <td align="left" valign="top">{{ $user['details']['education'] }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top" class="body"><strong> Occupation: </strong></td>
                                                            <td align="left" valign="top">
                                                                {{ $user['details']['occupation'] }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top" class="body"><strong> Income: </strong></td>
                                                            <td align="left" valign="top">
                                                                {{ $user['details']['income'] }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                <h6 class="inner">About Myself</h6>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top" class="body"><strong> About Myself: </strong></td>
                                                            <td align="left" valign="top">
                                                                {{ $user['details']['about_myself'] }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                <h6 class="inner">About My Preferred Partner</h6>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" valign="top" class="body"><strong> Partner Details: </strong></td>
                                                            <td align="left" valign="top">
                                                                {{ $user['details']['about_partner'] }}
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            @endif


                                            <a href="" class="btn btn-primary btn-mini">Edit</a>
                                            <a rel="" rel1="delete-product" href="javascript:" class="btn btn-danger btn-mini deleteRecord">Delete</a>
                                        </td>


                                    </tr>

                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection