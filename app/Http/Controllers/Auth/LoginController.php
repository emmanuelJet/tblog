<?php

namespace App\Http\Controllers\Auth;

use App\Post;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\welcome;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except(['logout']);
    }

    public function get_register(){
        return view('back-end.register');
    }

    public function post_register(){

     $this->validate(request(),
         [
             'name'=>'required|unique:users',
             'email'=>'bail|required|email|unique:users',
             'password'=>'required|confirmed|min:6'
         ]);

        $user = User::create(
            [
                'name'=>request('name'),
                'email'=>request('email'),
                'password'=>Hash::make(request('password'))
        ]);

        Profile::create([
            'user_id'=>$user->id,
            'avatar'=>'img/avater.png'
        ]);

      auth()->login($user);

    return redirect()->route('home')->with('messageRNU','Welcome To Your TBlog Dashboard '.auth()->user()->name)
    ->with(Mail::to($user)->send(new Welcome($user)));

    }

    public function get_login(){
        return view('back-end.login');
    }

    public function post_login(){
        if (! auth()->attempt(request(['email','password']))){
            return back()->withErrors(['message'=>'Please Check Your Credantials And Try Again']);
        }
        session()->flash('w_back','Welcome Back '.auth()->user()->name);
        return redirect()->route('home');
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('index_front');
    }


}
