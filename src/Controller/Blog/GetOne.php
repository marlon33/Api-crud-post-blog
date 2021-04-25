<?php
namespace App\Controller\Blog;

use App\Helper\JsonResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class GetOne extends Base
{
    public function __invoke(Request $request, Response $response, array $args): Response
    {
    	/* Envia o id capturado da rota {id} para getOne no BlogService */
        $post = $this->getBlogService()->getOne((int) $args['id']);

        return JsonResponse::withJson($response, (string) json_encode($post));
    }
}
