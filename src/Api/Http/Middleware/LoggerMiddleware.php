<?php

namespace Railken\LaraOre\Api\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;

class LoggerMiddleware
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        return $response;
    }

    public function terminate($request, $response)
    {
        $params = $request->all();

        unset($params['password']);
        unset($params['card']);

        // don't log the api that shows logs
        if ($request->path() === 'api/v1/admin/http-logs') {
            return;
        }

        $lm = new \Core\HttpLog\HttpLogManager();
        $log = $lm->create([
            'type' => 'inbound',
            'category' => 'api',
            'method' => $request->method(),
            'url' => $request->path(),
            'ip' => $request->ip(),
            'request' => json_encode(['headers' => $request->headers->all(), 'body' => $params]),
            'response' => json_encode($response->original)
        ]);
    }
}
