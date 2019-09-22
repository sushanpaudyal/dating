<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $recent_users = User::with('details')->with('photos')->where('admin', '!=' , 1)->orderBy('id', 'DESC')->limit(4)->get();
        return view ('index', compact('recent_users'));
    }
}
