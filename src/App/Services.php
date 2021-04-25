<?php
$container['generic_service'] = static function (Pimple\Container $container): App\Service\GenericService {
    return new App\Service\GenericService($container['generic_repository']);
};

$container['blog_service'] = static function (Pimple\Container $container): App\Service\BlogService {
    return new App\Service\BlogService($container['blog_repository']);
};