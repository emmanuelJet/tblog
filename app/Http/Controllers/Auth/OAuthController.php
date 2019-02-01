<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Socialite;
use App\User;
use App\Profile;
use App\Mail\welcome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class OAuthController extends Controller
{
	public function redirectToFacebook()
	{
		return Socialite::driver('facebook')->redirect();
	}

	public function handleFacebookCallback()
	{
		$userSocial = Socialite::driver('facebook')->user();
			
		$findUser = User::where('email',$userSocial->email)->first();
			
		if($findUser) {
			Auth::login($findUser);

			return redirect()->route('home')->with('messageRNU','Welcome To Dashboard '.auth()->user()->name);
		}else {
			$user = new User;

			$user->name = $userSocial->name;
			$user->email = $userSocial->email;
			$user->password = bcrypt(12345);
			$user->save();


			$profile = new Profile;
			
			$profile->user_id = $user->id;
			$profile->avatar = $userSocial->avatar;
			$profile->save();

			Auth::login($user);

			return redirect()->route('home')->with('messageRNU','Welcome To Dashboard '.auth()->user()->name);
		}
	}

	public function redirectToGoogle()
	{
		return Socialite::driver('google')->redirect();
	}

	public function handleGoogleCallback()
	{
		$userSocial = Socialite::driver('google')->user();
			
		$findUser = User::where('email',$userSocial->email)->first();
			
		if($findUser) {
			Auth::login($findUser);

			return redirect()->route('home')->with('messageRNU','Welcome To Dashboard '.auth()->user()->name);
		}else {
			$user = new User;

			$user->name = $userSocial->name;
			$user->email = $userSocial->email;
			$user->password = bcrypt(12345);
			$user->save();

			$profile = new Profile;
			
			$profile->user_id = $user->id;
			$profile->avatar = $userSocial->avatar;
			$profile->save();

			Auth::login($user);

			return redirect()->route('home')->with('messageRNU','Welcome To Dashboard '.auth()->user()->name);
		}
	}
}