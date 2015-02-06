<?php namespace App\Http\Middleware;

use Closure, Session;

class Authenticate {

	/**
	 * Handle an incoming request.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \Closure $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if ( ! Session::has('user'))
		{
			if ($request->ajax())
			{
				return response('Unauthorized', 401);
			}
			else
			{
				return redirect()->route('auth_signin');
			}
		}

		return $next($request);
	}

}
