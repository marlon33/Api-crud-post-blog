<?php
namespace App\Controller\Blog;

use App\Helper\JsonResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class GetAll extends Base
{
    public function __invoke(Request $request, Response $response): Response
    {
    	/* Chama BlogService e espera a respostas para o JsonResponse que ira retornar o resultado*/
        $posts = $this->getBlogService()->getAll();

        return JsonResponse::withJson($response, (string) json_encode($posts));
    }
}
