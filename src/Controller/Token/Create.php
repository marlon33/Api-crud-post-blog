<?php
namespace App\Controller\Token;

use App\Helper\JsonResponse;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class Create extends Base
{
    public function __invoke(Request $request, Response $response): Response
    {
    	/* Capitura o $_POST e o torna um array*/
    	$inputRegister = (array) $request->getParsedBody();
    	/* Envia o array para o funcção create no BlogService */
        $user = $this->getTokenService()->create($inputRegister);

        return JsonResponse::withJson($response, (string) json_encode($user));
    }
}
