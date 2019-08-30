<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

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
}
