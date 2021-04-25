<?php
$app->get('/', 'App\Controller\Home:getHelp');
$app->get('/status', 'App\Controller\Home:getStatus');

$app->get('/generic', App\Controller\Generic\GetAll::class);

/* Busca todos os posts já criados */
$app->get('/posts', App\Controller\Blog\GetAll::class);

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
$app->post('/posts', App\Controller\Blog\Create::class);

/* Busca nos posts já criados um em especifico pelo id */
$app->get('/posts/{id}', App\Controller\Blog\GetOne::class);
/* Busca e atualiza o post */
$app->put('/posts/{id}', App\Controller\Blog\Update::class);
/* Busca e deleta post por ID */
$app->delete('/posts/{id}', App\Controller\Blog\Delete::class);