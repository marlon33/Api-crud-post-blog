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
        /*$query = 'SELECT * FROM `Tabela`';
        $statement = $this->getDb()->prepare($query);
        $statement->execute();*/

        return array('status'=>'tudo certo');
    }
}
