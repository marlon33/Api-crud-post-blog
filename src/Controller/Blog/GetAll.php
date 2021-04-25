<?php
namespace App\Controller\Generic;

use App\Helper\JsonResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class GetAll extends Base
{
    public function __invoke(Request $request, Response $response): Response
    {
        $posts = $this->getBlogService()->getAll();

        return JsonResponse::withJson($response, (string) json_encode($posts));
    }
}
