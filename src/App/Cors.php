<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Tuupola\Middleware\JwtAuthentication as JwtAuth;

return static function (App $app): void {
    $app->options('/{routes:.+}', function (Request $request, Response $response) {
        return $response;
    });
    $app->add(new JwtAuth([
        "header" => "X-Token",
        "regexp" => "/(.*)/",
        "path" => "/api",
        "ignore" => ["/api/","/api/token","/api/register"],
        "secret" => $_SERVER['SECRET_KEY']
    ]));
    $app->add(function (Request $request, $handler): Response {
        $response = $handler->handle($request);

        return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader(
                'Access-Control-Allow-Headers',
                'X-Requested-With, Content-Type, Accept, Origin, Authorization'
            )
            ->withHeader(
                'Access-Control-Allow-Methods',
                'GET, POST, PUT, DELETE, PATCH, OPTIONS'
            );
    });
};
