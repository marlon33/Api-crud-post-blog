<?php
namespace App\Controller\Token;

use App\Helper\JsonResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class GetToken extends Base
{
    public function __invoke(Request $request, Response $response): Response {
        $input = (array) $request->getParsedBody();
        $post = $this->getTokenService()->getToken($input);
        return JsonResponse::withJson($response, (string) json_encode($post));
    }
}
