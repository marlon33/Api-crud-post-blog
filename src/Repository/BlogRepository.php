<?php
namespace App\Repository;

use App\Exception\BlogException;

final class BlogRepository
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function getDb()
    {
        return $this->database;
    }
    public function getAll(): array
    {
        /* Recebe a chamada do BlogService e pesquisa no banco de daos para encontrar todos os registros e retorna um Array()*/
        return $this->getDb()
            ->Articles  //Nome da *Tabela* dentro do MongoDB
            ->find()    // Função de pesquisa
            ->toArray(); // Retorno
    }
}
