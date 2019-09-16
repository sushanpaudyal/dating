<?php

namespace App\Http\Controllers;

use App\Country;
use App\Hobby;
use App\Language;
use App\User;
use App\UsersDetail;
use Illuminate\Http\Request;
use Auth;
use Session;

class UserController extends Controller
{
    public function register(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            $this->validate($request, [
                'g-recaptcha-response' => 'required|captcha',
            ]);

            $user = new User;
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = bcrypt($data['password']);
            $user->admin = 0;
            $user->save();
        }
        return view ('users.register');
    }

    public function checkEmail(Request $request){
        $data = $request->all();
        $userCount = User::where('email', $data['email'])->count();
        if($userCount > 0){
            echo 'false';
        } else {
            echo 'true';
        }
    }

    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            if(Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'admin' => '0'])){
                Session::put('frontSession', $data['email']);
                return redirect('/step/2');
            } else {
                return redirect()->back()->with('flash_message_error', 'Invalid username or password');
            }
        }
    }

    public function step2(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $userDetail = new UsersDetail;
            $userDetail->dob = $data['dob'];
            $userDetail->gender = $data['gender'];
            $userDetail->height = $data['height'];
            $userDetail->maritial_status = $data['maritial_status'];
            $userDetail->user_id = Auth::user()->id;
            $userDetail->save();
        }
        $countries = Country::all();
        $languages = Language::all();
        $hobbies = Hobby::all();
        return view ('users.step2', compact('countries','languages', 'hobbies'));
    }

    public function logout(){
        Auth::logout();
        Session::forget('frontSession');
        return redirect()->action('IndexController@index');
    }
}
