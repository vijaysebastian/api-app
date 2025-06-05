<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class WelcomeController extends Controller
{
    /**
        * Display a welcome message.
        * @return \Illuminate\Http\JsonResponse
        */
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'memory_limit' => ini_get('memory_limit'),
            'upload_max_filesize' => ini_get('upload_max_filesize'),
            'max_execution_time' => ini_get('max_execution_time'),
        ]);
    }

    public function validationFail(): \Illuminate\Http\JsonResponse
    {
        throw ValidationException::withMessages([
            'email' => ['Email is required.'],
        ]);
    }
}
