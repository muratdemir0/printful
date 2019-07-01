<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
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
     * @param  \Exception $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Exception $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if ($e instanceof NotFoundHttpException) {
            return response()->setStatusCode(404, $e->getMessage());
        } elseif ($e instanceof ModelNotFoundException) {
            return response()->setStatusCode(404, $e->getMessage());
        } elseif ($e instanceof RouteNotFoundException) {
            return response()->setStatusCode(404, $e->getMessage());
        } elseif ($e instanceof MethodNotAllowedException) {
            return response()->setStatusCode(404, $e->getMessage());
        } elseif ($e instanceof ValidationException) {
            $messages = $e->validator->errors()->getMessages();
            $messages = array_unique(array_column($messages, 0));
            return response(['message' => implode(' - ', $messages)],422);
        } elseif ($e instanceof AuthenticationException) {
            return response()->setStatusCode(401);
        }

        if (env('APP_ENV') != 'production') {
            return response()->setStatusCode(500, $e->getMessage());
        }
    }
}
