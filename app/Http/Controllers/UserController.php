<?php

namespace App\Http\Controllers;

use App\Country;
use App\Hobby;
use App\Language;
use App\User;
use App\UsersDetail;
use App\UsersPhoto;
use Illuminate\Http\Request;
use Auth;
use Session;
use Image;


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

            if(Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'admin' => '0'])){
                Session::put('frontSession', $data['email']);
                return redirect('/step/2');
            }
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

        // Check if dating profile already exists and under review
        $userProfileCount = UsersDetail::where(['user_id'=> Auth::user()->id, 'status' => 0])->count();
        if($userProfileCount > 0){
            return redirect('/review');
        }

        if($request->isMethod('post')){
            $data = $request->all();

            if(empty($data['user_id'])){
                $userDetail = new UsersDetail;
                $userDetail->user_id = Auth::user()->id;
            } else {
                $userDetail = UsersDetail::where('user_id', $data['user_id'])->first();
                $userDetail->status = 0;
            }



            $userDetail->dob = $data['dob'];
            $userDetail->gender = $data['gender'];
            $userDetail->height = $data['height'];
            $userDetail->maritial_status = $data['maritial_status'];

            if(empty($data['body_type'])){
                $userDetail->body_type = "";
            } else {
                $userDetail->body_type = $data['body_type'];

            }

            if(empty($data['city'])){
                $userDetail->city = "";
            } else {
                $userDetail->city = $data['city'];
            }

            if(empty($data['state'])){
                $userDetail->state = "";
            } else {
                $userDetail->state = $data['state'];
            }

            $userDetail->country = $data['country'];
            $userDetail->education = $data['education'];
            $userDetail->occupation = $data['occupation'];
            $userDetail->income = $data['income'];
            $userDetail->about_myself = $data['about_myself'];
            $userDetail->about_partner = $data['about_partner'];

            $hobbies = "";
            if(!empty($data['hobbies'])){
                foreach ($data['hobbies'] as $hobby){
                    $hobbies .= $hobby . ', ';
                }
            }
            $userDetail->hobbies = $hobbies;

            $languages = "";

            if(!empty($data['languages'])){
                foreach ($data['languages'] as $language){
                    $languages .= $language . ', ';
                }
            }
            $userDetail->languages = $languages;





            $userDetail->save();

            return redirect('/review');
        }
        $countries = Country::all();
        $languages = Language::all();
        $hobbies = Hobby::all();
        return view ('users.step2', compact('countries','languages', 'hobbies'));
    }

    public function step3(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            if($request->hasFile('photo')){
                $files = $request->file('photo');
                foreach($files as $file){
                    // Upload photo at folder
                    $extension = $file->getClientOriginalExtension();
                    $fileName = rand(111,99999).'.'.$extension;
                    $image_path = "images/frontend_images/photos/".$fileName;
                    Image::make($file)->resize(600,600)->save($image_path);

                    $photo = new UsersPhoto;
                    $photo->photo = $fileName;
                    $photo->user_id = $data['user_id'];
                    $photo->default_photo = "No";
                    $photo->status = 0;
                    $photo->save();
                }
            }
            return redirect('/step/3')->with('flash_message_success', 'Your Photos Has Been Added Successfully');
        }

        $user_id = Auth::user()->id;
        $user_photos = UsersPhoto::where('user_id', $user_id)->get();
        return view ('users.step3', compact('user_photos'));
    }

    public function review(){
        $user_id = Auth::user()->id;
        $userStatus = UsersDetail::select('status')->where('user_id', $user_id)->first();
        if($userStatus->status == 1){
            return redirect()->route('step2');
        } else {
            return view ('users.review');
        }
    }

    public function logout(){
        Auth::logout();
        Session::forget('frontSession');
        return redirect()->action('IndexController@index');
    }



    public function viewUsers(){
        $users = User::with('details')->where('admin', '!=', 1)->get();
//        $users = json_decode(json_encode($users), true);
        return view ('admin.users.view_users', compact('users'));
    }

    public function updateUserStatus(Request $request){
        $data = $request->all();
        UsersDetail::where('user_id', $data['user_id'])->update(['status' => $data['status']]);
    }
}
