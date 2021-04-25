<?php
$baseDir = __DIR__ . '/../../';
$dotenv = Dotenv\Dotenv::createImmutable($baseDir);
if (file_exists($baseDir . '.env')) {
    $dotenv->load();
}
$dotenv->required([
	'MongoDB_HOST',
	'MongoDB_COLLATION',
	'MongoDB_RETRY_WRITES',
	'MongoDB_W',
	'SECRET_KEY'
]);
