<?php
namespace App\Repository;

use App\Exception\GenericException;

final class GenericRepository
{
    private \PDO $database;

    public function __construct(\PDO $database)
    {
        $this->database = $database;
    }

    public function getDb(): \PDO
    {
        return $this->database;
    }
    public function getAll(): array
    {
        /*$query = 'SELECT * FROM `Tabela`';
        $statement = $this->getDb()->prepare($query);
        $statement->execute();*/

        return array('status'=>'tudo certo');
    }
}
