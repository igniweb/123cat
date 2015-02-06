<?php namespace App\Http\Middleware;

use Closure, Session;

class RedirectIfAuthenticated {

	/**
	 * Handle an incoming request.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \Closure $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if (Session::has('user'))
		{
			return redirect()->route('admin');
		}

		return $next($request);
	}

}
