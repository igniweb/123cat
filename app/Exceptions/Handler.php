<?php namespace App\Exceptions;

use Exception, Mail;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler {

	/**
	 * A list of the exception types that should not be reported.
	 *
	 * @var array
	 */
	protected $dontReport = [
		'Symfony\Component\HttpKernel\Exception\HttpException'
	];

	/**
	 * Report or log an exception.
	 *
	 * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
	 *
	 * @param \Exception $e
	 * @return void
	 */
	public function report(Exception $e)
	{
		return parent::report($e);
	}

	/**
	 * Render an exception into an HTTP response.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \Exception $e
	 * @return \Illuminate\Http\Response
	 */
	public function render($request, Exception $e)
	{
		if ($this->isHttpException($e))
		{
			return $this->renderHttpException($e);
		}
		else if ($e instanceof OAuthException)
		{
			return $this->renderOAuthException($e);
		}
		else if ($e instanceof AuthException)
		{
			return $this->notifyAuthException($e);
		}
		else
		{
			return parent::render($request, $e);
		}
	}

	/**
	 * Render the given OAuthException.
	 *
	 * @param \App\Services\OAuth\OAuthException $e
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	private function renderOAuthException(OAuthException $e)
	{
		if (view()->exists('errors.403'))
		{
			return response()->view('errors.403', ['message' => $e->getMessage()], 403);
		}
		else
		{
			return (new SymfonyDisplayer(config('app.debug')))->createResponse($e);
		}
	}

	/**
	 * Notify by email about an AuthException.
	 *
	 * @param \App\Services\OAuth\AuthException $e
	 * @return \Illuminate\Http\RedirectResponse
	 */
	private function notifyAuthException(AuthException $e)
	{
		$data = [
			'content' => $e->getMessage(),
		];

		Mail::send('emails.errors.auth', $data, function ($message) {
			$message->to(env('MAIL_ADMIN'))->subject(trans('app.errors.auth'));
		});
		
		return redirect()->route('home');
	}

}
