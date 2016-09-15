<?php
namespace App\Middleware;

class TestMiddleware
{
    public function __invoke(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response, callable $next = null)
    {
        $response = $next($request, $response);
        return $response->withHeader('X-TEST_HEADER', ['TESTING']);
    }
}
