<?php

namespace App\Http\Middleware;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    protected function unauthenticated($request, array $guards)
    {
        throw new AuthenticationException(
            'Unauthenticated.', $guards, $this->customRedirectTo($request,$guards)
        );
    }
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function customRedirectTo(Request $request,array $guards): ?string
    {
        if ($guards[0]==='admin'){
            return $request->expectsJson() ? null : route('dashboard.login');
        }else{
            return $request->expectsJson() ? null : route('login');
        }
    }
}
