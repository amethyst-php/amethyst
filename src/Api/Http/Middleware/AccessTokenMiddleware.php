<?php

namespace Railken\LaraOre\Api\Http\Middleware;

use Closure;
use Symfony\Component\HttpFoundation\HeaderBag;

class AccessTokenMiddleware
{
    public function handle($request, Closure $next)
    {
        $request->server->set('ACCEPT', 'application/json');

        $request->headers = new HeaderBag($request->server->getHeaders());

        return $next($request);
    }
}
