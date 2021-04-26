# RESTful API CRUD POST BLOG

## API Uso
#### Cadastro

##### POST [/api/register](/api/register) Exemplo php
```php
//http://localhost/api/register
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'http://localhost/api/register');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
$post = array(
    'user' => 'usuario_de_cadastro',
    'pass' => 'senha_de_cadastro'
);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));

$headers = array();
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);
```

##### Parâmetros  


Nome | Tipo | Descrição
------------ | ------------- | -------------
User | string | Post
pass | string | Post


##### Resposta
Status: 200 OK
```json
{
  "status": "success",
  "message": "Usuario cadastrado com sucesso",
  "user_id": 1
}
```

#### Token

##### POST [/api/token](/api/token) Exemplo php
```php
//http://localhost/api/register
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'http://localhost/api/token');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
$post = array(
    'user' => 'usuario_de_cadastro',
    'pass' => 'senha_de_cadastro'
);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));

$headers = array();
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);
```

##### Parâmetros  


Nome | Tipo | Descrição
------------ | ------------- | -------------
User | string | Post
pass | string | Post


##### Resposta
Status: 200 OK
```json
{
"status": "success",
"token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJfaWQiOjUsInVzZXIiOiJUZXNhbnRhc2FkIiwicGFzcyI6IjU0MDczZWIwYzFiY2JhYjNiNzIyZDRjODQ4ZDNiMzhiIiwiY3JlYXRlZCI6MTYxOTM1NjE5Nn0.yBwBMYH0ad7RTgg2ne0r6CD2vdgeJDwFcroj1IBStTQ"
}
```


#### Buscar todos os Posts

##### GET [/api/posts](/api/posts) Exemplo php
```php
//http://localhost/api/register
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'http://localhost/api/posts');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


$headers = array();
$headers[] = 'X-Token: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJfaWQiOjUsInVzZXIiOiJUZXNhbnRhc2FkIiwicGFzcyI6IjU0MDczZWIwYzFiY2JhYjNiNzIyZDRjODQ4ZDNiMzhiIiwiY3JlYXRlZCI6MTYxOTM1NjE5Nn0.yBwBMYH0ad7RTgg2ne0r6CD2vdgeJDwFcroj1IBStTQ';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch)
```

##### Parâmetros


Nome | Tipo | Descrição
------------ | ------------- | -------------
X-Token | string | header


##### Resposta
Status: 200 OK
Array
```array
[
    {
        "_id": 1,
        "title": "Lorem Ipsum 1",
        "body": "lorem ipsum 1",
        "created": 1619354757,
        "modified": 1619354757,
        "author": "Autor 1"
    },
    {
        "_id": 2,
        "title": "Lorem Ipsum 2",
        "body": "lorem ipsum 2",
        "created": 1619354757,
        "modified": 1619354757,
        "author": "Autor 2"
    },
    {
        "_id": 3,
        "title": "Lorem Ipsum 3",
        "body": "lorem ipsum 3",
        "created": 1619354757,
        "modified": 1619354757,
        "author": "Autor 3"
    }
]
```


#### Criar post

##### POST [/api/posts](/api/posts) Exemplo php
```php
//http://localhost/api/register
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'http://localhost/api/tooken');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
$post = array(
    'title' => 'Titulo de Exemplo',
    'body' => 'Body de Exemplo',
    'author' => 'Autor de Exemplo',
);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));

$headers = array();
$headers[] = 'X-Token: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJfaWQiOjUsInVzZXIiOiJUZXNhbnRhc2FkIiwicGFzcyI6IjU0MDczZWIwYzFiY2JhYjNiNzIyZDRjODQ4ZDNiMzhiIiwiY3JlYXRlZCI6MTYxOTM1NjE5Nn0.yBwBMYH0ad7RTgg2ne0r6CD2vdgeJDwFcroj1IBStTQ';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);
```

##### Parâmetros  


Nome | Tipo | Descrição
------------ | ------------- | -------------
X-Token | string | header
title | string | Post
body | string | Post
author | string | Post


##### Resposta
Status: 200 OK
```json
{
    "status": "success",
    "id_post": 1
}
```



#### Buscar Post específico

##### GET [/api/posts/{id}](/api/posts/{id}) Exemplo php
```php
//http://localhost/api/register
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'http://localhost/api/posts/1');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


$headers = array();
$headers[] = 'X-Token: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJfaWQiOjUsInVzZXIiOiJUZXNhbnRhc2FkIiwicGFzcyI6IjU0MDczZWIwYzFiY2JhYjNiNzIyZDRjODQ4ZDNiMzhiIiwiY3JlYXRlZCI6MTYxOTM1NjE5Nn0.yBwBMYH0ad7RTgg2ne0r6CD2vdgeJDwFcroj1IBStTQ';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch)
```

##### Parâmetros


Nome | Tipo | Descrição
------------ | ------------- | -------------
X-Token | string | header


##### Resposta
Status: 200 OK
Array
```array
  {
      "_id": 1,
      "title": "Lorem Ipsum 1",
      "body": "lorem ipsum 1",
      "created": 1619354757,
      "modified": 1619354757,
      "author": "Autor 1"
  }
```

#### Atualizar Post

##### PUT [/api/posts/{id}](/api/posts/{id}) Exemplo php
```php
//http://localhost/api/register
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'http://localhost/api/posts/1');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');

$post = array(
    "title": "Titulo Alterado",
    "body": "Body  Alterado",
    "author": "Autor"
);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));

$headers = array();
$headers[] = 'X-Token: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJfaWQiOjUsInVzZXIiOiJUZXNhbnRhc2FkIiwicGFzcyI6IjU0MDczZWIwYzFiY2JhYjNiNzIyZDRjODQ4ZDNiMzhiIiwiY3JlYXRlZCI6MTYxOTM1NjE5Nn0.yBwBMYH0ad7RTgg2ne0r6CD2vdgeJDwFcroj1IBStTQ';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch)
```

##### Parâmetros


Nome | Tipo | Descrição
------------ | ------------- | -------------
X-Token | string | header
title | string | Post
body | string | Post
author | string | Post


##### Resposta
Status: 200 OK
Array
```array
  {
    "_id": 1,
    "title": "Titulo Alterado",
    "body": "Body  Alterado",
    "created": 1619354757,
    "modified": 1619358822,
    "author": "teste"
  }
```



#### Delete Post específico

##### DELETE [/api/posts/{id}](/api/posts/{id}) Exemplo php
```php
//http://localhost/api/register
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'http://localhost/api/posts/1');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');


$headers = array();
$headers[] = 'X-Token: eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJfaWQiOjUsInVzZXIiOiJUZXNhbnRhc2FkIiwicGFzcyI6IjU0MDczZWIwYzFiY2JhYjNiNzIyZDRjODQ4ZDNiMzhiIiwiY3JlYXRlZCI6MTYxOTM1NjE5Nn0.yBwBMYH0ad7RTgg2ne0r6CD2vdgeJDwFcroj1IBStTQ';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);
```

##### Parâmetros


Nome | Tipo | Descrição
------------ | ------------- | -------------
X-Token | string | header


##### Resposta
Status: 200 OK
Array
```array
{
  "message": "Post deletado",
  "status": "success",
  "code": 200
}
```
