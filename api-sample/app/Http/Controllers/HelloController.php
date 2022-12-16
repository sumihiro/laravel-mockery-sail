<?php

namespace App\Http\Controllers;

use App\Services\HelloWorldService;
use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function echo(HelloWorldService $helloWorldService)
    {
        return response()->json(['message' => $helloWorldService->hello()]);
    }
}
