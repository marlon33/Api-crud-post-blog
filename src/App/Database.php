<?php
use Pimple\Container;
/** @var Container $container */
$container['mongoDB'] = function(){
    $collation = $_SERVER['MongoDB_COLLATION'];
    $host = $_SERVER['MongoDB_HOST'];
    $retryWrites = $_SERVER['MongoDB_RETRY_WRITES'];
    $w = $_SERVER['MongoDB_W'];
    $client = new MongoDB\Client(
    'mongodb+srv://'.$host.''.$collation.'?retryWrites='.$retryWrites.'&w='.$w);
    $db = $client->$collation;
    return $db;
};