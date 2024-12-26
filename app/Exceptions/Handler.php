<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e): \Illuminate\Http\Response|\Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response|\Illuminate\Http\RedirectResponse
    {
        // Check if the exception is a 404 (NotFoundHttpException)
        if ($e instanceof NotFoundHttpException) {
            // Check if the URL starts with "dashboard/"
            if ($request->is('dashboard/*')) {
                return response()->view('dashboard.pages.404', [], 404);
            }
            // Default 404 page
            return response()->view('front.pages.404', [], 404);
        }

        return parent::render($request, $e);
    }
}
