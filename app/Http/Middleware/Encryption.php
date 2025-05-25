<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpFoundation\Response;

class Encryption extends Middleware
{
    protected $except = [
        //
    ];
}
