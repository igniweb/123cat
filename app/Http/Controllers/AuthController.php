<?php namespace App\Http\Controllers;

use Input, Session;
use App\Services\OAuth\ProviderInterface;
use App\User;
use Carbon\Carbon;

class AuthController extends Controller {

	protected $provider;

	public function __construct(ProviderInterface $provider)
	{
		$this->provider = $provider;
	}

	public function signin()
	{
		$authorizationUrl = $this->provider->authorizationUrl();

		return view('auth.signin', compact('authorizationUrl'));
	}

	public function oauth()
	{
		$token = $this->provider->accessToken(Input::get('code'));

		$user = $this->provider->user($token);

		$dbUser = User::where('email', '=', $user->email)->firstOrFail();

		$dbUser->name = $user->name;
		$dbUser->avatar = str_replace('sz=50', 'sz=50', $user->avatar);
		$dbUser->save();

		Session::put('user', $dbUser->toArray());

		return redirect()->route('admin');
	}

	public function signout()
	{
		Session::forget('user');
		Session::regenerate();

		return redirect()->route('home');
	}

}
