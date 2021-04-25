<?php
$container['generic_service'] = static function (Pimple\Container $container): App\Service\GenericService {
    return new App\Service\GenericService($container['generic_repository']);
};
