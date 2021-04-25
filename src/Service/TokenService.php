<?php
namespace App\Service;

use App\Exception\TokenException;
use App\Repository\TokenRepository;

final class TokenService
{
    private TokenRepository $tokenRepository;

    public function __construct(TokenRepository $tokenRepository)
    {
        $this->tokenRepository = $tokenRepository;
    }

    public function getToken(array $input): object
    {
        $input = json_decode((string) json_encode($input), false);
        return $this->tokenRepository->getToken($input);
    }
    public function create(array $input): array
    {
        $input = json_decode((string) json_encode($input), false);
        return $this->tokenRepository->create($input);
    }

}
