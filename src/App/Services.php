<?php
$container['blog_service'] = static function (Pimple\Container $container): App\Service\BlogService {
    return new App\Service\BlogService($container['blog_repository']);
};