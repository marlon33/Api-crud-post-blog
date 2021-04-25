<?php
$app->get('/api/', 'App\Controller\Home:getHelp');
$app->get('/api/status', 'App\Controller\Home:getStatus');

/* Busca todos os posts já criados */
$app->get('/api/posts', App\Controller\Blog\GetAll::class);

/* Cria um post
    [   
        '_id' => Fornecido pelo sistema
        'title' => Fornecido pelo cliente,
        'body' => Fornecido pelo cliente,
        'created' => Fornecido pelo sistema,
        'modified'=> Fornecido pelo sistema,
        'author'=> Fornecido pelo cliente
    ]
*/
$app->post('/api/posts', App\Controller\Blog\Create::class);

/* Busca nos posts já criados um em especifico pelo id */
$app->get('/api/posts/{id}', App\Controller\Blog\GetOne::class);
/* Busca e atualiza o post */
$app->put('/api/posts/{id}', App\Controller\Blog\Update::class);
/* Busca e deleta post por ID */
$app->delete('/api/posts/{id}', App\Controller\Blog\Delete::class);

$app->post('/api/token', App\Controller\Token\GetToken::class);