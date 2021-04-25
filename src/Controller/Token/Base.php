<?php
namespace App\Controller\Token;

use App\Service\TokenService;
use Pimple\Psr11\Container;

abstract class Base
{
    protected Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    protected function getTokenService(): TokenService
    {
        return $this->container->get('token_service');
    }
}
