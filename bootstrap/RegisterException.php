<?php
namespace Bootstrap;

use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\QueryException;
use Throwable;

class RegisterException
{
    public function __invoke(Exceptions $exceptions): void
    {
        $exceptions->renderable(function (Throwable $e) {
            return match (true) {
                $e instanceof ValidationException => response()->json([
                    'message' => 'Validation failed',
                    'errors' => $e->errors(),
                ], 422),

                $e instanceof NotFoundHttpException => response()->json([
                    'message' => 'Resource not found',
                ], 404),

                $e instanceof HttpResponseException => response()->json([
                    'message' => 'HTTP exception',
                    'error' => $e->getMessage(),
                ], $e->getResponse()?->getStatusCode() ?? 400),

                $e instanceof QueryException => response()->json([
                    'message' => 'Database query error',
                    'error' => $e->getMessage(),
                ], 500),

                default => response()->json([
                    'message' => 'An unexpected error occurred',
                    'error' => $e->getMessage(),
                ], 500),
            };
        });
    }
}
