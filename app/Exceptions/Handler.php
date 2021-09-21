<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param Exception $exception
     * @return void
     * @throws Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  Request  $request
     * @param Exception $exception
     * @return Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof \Spatie\Permission\Exceptions\UnauthorizedException) {
            return response()->json(['User have not permission for this page access.']);
        }

        return parent::render($request, $exception);
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param Request $request
     * @param AuthenticationException $exception
     * @return Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }
        if ($request->is('admin') || $request->is('admin/*')) {
            return redirect()->guest('/admin/login');
        }
        if ($request->is('driver') || $request->is('driver/*')) {
            return redirect()->guest('/driver/login');
        }
        if ($request->is('partner') || $request->is('partner/*')) {
            return redirect()->guest('/partner/login');
        }
        if ($request->is('rider') || $request->is('rider/*')) {
            return redirect()->guest('/rider/login');
        }
        if ($request->is('api') || $request->is('api/*')) {
            return response()->json(['status' => 403, 'message' => 'Not authorized yet.']);
        }
        return redirect()->guest(route('rider.login'));
    }
}
