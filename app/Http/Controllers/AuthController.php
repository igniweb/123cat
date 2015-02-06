<?php namespace App\Http\Controllers;

use Input, Session;
use App\Exceptions\AuthException;
use App\Services\OAuth\ProviderInterface;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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

		$model = $this->saveUser($user);

		Session::put('user', $model->toArray());

		return redirect()->route('admin');
	}

	private function saveUser($user)
	{
		try
		{
// @todo Debug email layout
//$model = User::where('email', '=', $user->email . 't')->firstOrFail();
			$model = User::where('email', '=', $user->email)->firstOrFail();
		}
		catch (ModelNotFoundException $e)
		{
			throw new AuthException(print_r($user->toArray(), true));
		}

		$model->name = $user->name;
		$model->avatar = str_replace('sz=50', 'sz=150', $user->avatar);
		$model->save();
		
		return $model;
	}

	public function signout()
	{
		Session::forget('user');
		Session::regenerate();

		return redirect()->route('home');
	}

}
