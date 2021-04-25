<?php
use Pimple\Container;
use Pimple\Psr11\Container as Psr11Container;
use Slim\Factory\AppFactory;

$container = new Container();

return AppFactory::create(null, new Psr11Container($container));
