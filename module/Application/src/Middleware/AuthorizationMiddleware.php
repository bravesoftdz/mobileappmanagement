<?php

namespace Application\Middleware;

use Psr\Http\Message\ServerRequestInterface as RequestInterface;
use Psr\Http\Message\ResponseInterface;

class AuthorizationMiddleware {

    public function __invoke(RequestInterface $request, ResponseInterface $response, callable $next = null) {
        print_r($request);
    }

}
