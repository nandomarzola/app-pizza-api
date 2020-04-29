<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param Throwable $exception
     * @return \Illuminate\Http\JsonResponse
     */
    public function render($request, Throwable $exception)
    {
        $message = $exception->getMessage() ? $exception->getMessage() : "An internal error occurred";
        $code = $exception->getCode() ? $exception->getCode() : 500;
        $errors = [];

        if ($exception instanceof ModelNotFoundException) {
            $message = "No register found with the provided data";
            $code = 404;
        }

        if ($exception instanceof ValidationException) {
            $errors = $exception->errors();
        }

        return response()->json([
            'message' => $message,
            'code' => $code,
            'errors' => $errors
        ], $code);
    }
}
