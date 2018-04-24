<?php

namespace Railken\LaraOre\Api\Http\Middleware;

use Closure;
use Symfony\Component\HttpFoundation\HeaderBag;

class AcceptJsonMiddleware
{
    public function handle($request, Closure $next)
    {
        $request->server->set('HTTP_ACCEPT', 'application/json');
        $request->headers = new HeaderBag($request->server->getHeaders());

        return $next($request);
    }
}
