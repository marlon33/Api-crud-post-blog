<?php
$container['blog_repository'] = static function (Pimple\Container $container): App\Repository\BlogRepository {
    return new App\Repository\BlogRepository($container['mongoDB']);
};
