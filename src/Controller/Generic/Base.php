<?php
namespace App\Controller\Generic;

use App\Service\GenericService;
use Pimple\Psr11\Container;

abstract class Base
{
    protected Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    protected function getGenericService(): GenericService
    {
        return $this->container->get('generic_service');
    }
}
