<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;//for authentication
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
class UserController extends Controller
{
    //

    public function postSignup(Request $request)
    {
    	# code...
        $this->validate($request,[

            'email' => 'required|email|unique:users',
            'first_name' => 'required|min:4|max:120',
            'password' =>  'required|min:6'

            ]);
    	$email  = $request['email'];
    	$first_name = $request['first_name'];
    	$password = bcrypt($request['password']);

    	$user = new user;
    	$user->email = $email;
    	$user->first_name = $first_name;
    	$user->password = $password;
    	$user->save();

        return redirect()->back();
    }

    public function postSignin(Request $request) //Request uses Laravel Dependency injection
    {
    	# code...
        $this->validate($request,[

            'email' => 'required|email',
            'password' =>  'required|min:6'

            ]);
        if(Auth::attempt(['email'=> $request['email'],'password'=> $request['password']])){
            return redirect('/dashboard');
        }
        return redirect()->back();
    }

    public function logout()
    {
        # code...
        Auth::logout();
        return redirect()->route('home');
    }

    public function getAccount()
    {
        # code...
        return  view('account',['user' => Auth::user()]);
    }

    public function postSaveaccount(Request $request)
    {
        # code...

        $this->validate($request,[

            'first_name'=>'required'

        ]);

        $user = Auth::user();
        $user->first_name = $request['first_name'];
        $user->update();
        $file = $request->file('image');
        $filename = $request->first_name . '-' . $user->id .'.jpg';
        if($file){
           Storage::disk('local')->put($filename,File::get($file));//stores in local storage/app path
        }

        return redirect()->route('account');
        
    }

    public function getuserimage($filename)
    {
        # code...
        $file = Storage::disk('local')->get($filename);
        return new response($file,200);  ///here we dont redirect to any view we want only response to direct to img src in account view using account.image route
    }
}



