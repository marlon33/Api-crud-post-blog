
# RESTful API CRUD POST BLOG

## BANCO DE DADOS:

### 1- Clone ou baixe o projeto e instale as dependências:

```bash
$ git clone https://github.com/maurobonfietti/rest-api-slim-php.git
$ cd rest-api-slim-php
$ cp .env.example .env
$ composer install
```


### 2- Crie um banco de dados [MongoDB](https://www.mongodb.com/).

Nome o banco de dados pode a sua escolha:
#### 2.1 Nome das collations
- Articles
- users
#### 2.2 Liberando IP

##### 2.2.1 Liberando todos os ips
- Network Access
  - ADD IP ADRESS
    - Allow Access from Anywhere `Libera todos os IP`
    - Add Current IP Address `Libera somente o IP do acesso atual`


### 3- Altere o arquivo `.env.example` para `.env`.
- Utilize o seguinte codigo no terminal onde esta o arquivo `.env`
```bash
$ cp .env.example .env
```
Altere os dados do arquivo
```shell
MongoDB_HOST = 'Link_mongoDB_atlas'
MongoDB_COLLATION = Collation
MongoDB_RETRY_WRITES = 'true'
MongoDB_W = 'majority'

SECRET_KEY = 'SECRET_KEY'

DISPLAY_ERROR_DETAILS=true
SLIM_BASE_PATH=''

```
+ Secret Key você pode definir uma propria ou pegar uma nesse [Site](http://nux.net/secret)
+ Não se esqueça de altera `DISPLAY_ERROR_DETAILS` de `true` para `false` em ambiente de proução

## INSTALAÇÃO PRONTA BASTA RODAR:
- [Testar Api](http://localhost/api/api)

### Documentação de como Utilizar

[Documentaçao](https://)
