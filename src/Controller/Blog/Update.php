<?php
namespace App\Controller\Blog;

use App\Helper\JsonResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class Update extends Base
{
    public function __invoke(Request $request, Response $response, array $args): Response {
        $input = (array) $request->getParsedBody();        
        $post = $this->getBlogService()->update($input, (int) $args['id']);
        return JsonResponse::withJson($response, (string) json_encode($post));
    }
}
