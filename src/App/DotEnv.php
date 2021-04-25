<?php
$baseDir = __DIR__ . '/../../';
$dotenv = Dotenv\Dotenv::createImmutable($baseDir);
if (file_exists($baseDir . '.env')) {
    $dotenv->load();
}
$dotenv->required([
	'DB_HOST', 'DB_NAME', 'DB_USER', 'DB_PASS', 'DB_PORT',
	'MongoDB_HOST', 'MongoDB_COLLATION', 'MongoDB_RETRY_WRITES', 'MongoDB_W'
]);
