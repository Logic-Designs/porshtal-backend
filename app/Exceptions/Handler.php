<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($request->is('api/*')) {
            if ($exception instanceof ValidationException) {
                $errorMessages = collect($exception->errors())->flatten()->first();
                return response()->error('Bad request', $errorMessages, Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            if ($exception instanceof NotFoundHttpException) {
                return response()->error('Route not found', '', Response::HTTP_NOT_FOUND);
            }

            if ($exception instanceof AuthorizationException) {
                return response()->error('Forbidden', '', Response::HTTP_FORBIDDEN);
            }

            if ($exception instanceof ModelNotFoundException) {
                return response()->error('Resource not found', '', Response::HTTP_NOT_FOUND);
            }

            if ($exception instanceof AuthenticationException) {
                return response()->error('Unauthenticated', '', Response::HTTP_UNAUTHORIZED);
            }
        }

        return parent::render($request, $exception);
    }
}
