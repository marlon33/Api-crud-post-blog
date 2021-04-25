<?php
$container['generic_repository'] = static function (Pimple\Container $container): App\Repository\GenericRepository {
    return new App\Repository\GenericRepository($container['db']);
};

$container['blog_repository'] = static function (Pimple\Container $container): App\Repository\BlogRepository {
    return new App\Repository\BlogRepository($container['mongoDB']);
};
