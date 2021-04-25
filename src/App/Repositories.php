<?php
$container['generic_repository'] = static function (Pimple\Container $container): App\Repository\GenericRepository {
    return new App\Repository\GenericRepository($container['db']);
};
