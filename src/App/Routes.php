<?php
$app->get('/', 'App\Controller\Home:getHelp');
$app->get('/status', 'App\Controller\Home:getStatus');

$app->get('/generic', App\Controller\Generic\GetAll::class);