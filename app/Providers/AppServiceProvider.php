<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->singleton('GuzzleHttp\ClientInterface', function () {
			return new \GuzzleHttp\Client([
				'defaults' => [
					'verify' => false,
				]
			]);
		});

		$this->app->singleton('App\Services\OAuth\ProviderInterface', function ($app) {
			return new \App\Services\OAuth\Google([
				'client_id'     => env('OAUTH_CLIENT_ID'),
				'client_secret' => env('OAUTH_CLIENT_SECRET'),
				'redirect_uri'  => route('auth_oauth'),
				'scopes'        => ['profile', 'email'],
			], $app['GuzzleHttp\ClientInterface']);
		});
	}

}
