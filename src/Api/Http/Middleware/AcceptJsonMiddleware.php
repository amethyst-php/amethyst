<?php

namespace Railken\Laravel\Core\Api\Http\Middleware;

use Symfony\Component\HttpFoundation\HeaderBag;
use Closure;

class AcceptJsonMiddleware
{
    public function handle($request, Closure $next)
    {
        $request->server->set('HTTP_ACCEPT', 'application/json');
        $request->headers = new HeaderBag($request->server->getHeaders());
        return $next($request);
    }
}
