<?php
namespace App\Middleware;

use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Ramsey\Uuid\Uuid;

class UuidMiddleware
{
    public function __invoke(\Psr\Http\Message\ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response, callable $next = null)
    {
        $response = $next($request, $response);

        $uuid = '';

        try {
           $uuid = Uuid::uuid4();
        } catch(UnsatisfiedDependencyException $e) {
            echo 'Exception: ' . $e->getMessage();
        }

        return $response->withHeader('X-REQUEST_UUID', $uuid);
    }
}
