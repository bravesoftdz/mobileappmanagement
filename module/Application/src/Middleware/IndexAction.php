<?php

namespace Application\Middleware;

class IndexAction {

    public function __invoke($request, $response) {
        print_r($request);
        $response->getBody()->write('Hello World!');
        return $response;
    }

}
