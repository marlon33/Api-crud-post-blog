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

    /* Pega o ultimo Id do Ultimo registro no banco de dados utilizado para incremento de _id*/
    public function getLastId($collection){
        $numRow = $this->getDb()->$collection->count();
        $result = 0;
        if ($numRow<=0) {
            $result = 0;
        }else{
            $filter  = [];
            $options = ['sort' => ['_id' => -1], 'limit' => 1];
            $doc = $this->getDb()->$collection->findOne($filter, $options);
            $result=$doc->_id;
        }
        return $result;
    }

    public function getAll(): array
    {
        /* Recebe a chamada do BlogService e pesquisa no banco de daos para encontrar todos os registros e retorna um Array()*/
        return $this->getDb()
            ->Articles  //Nome da *Tabela* dentro do MongoDB
            ->find()    // Função de pesquisa
            ->toArray(); // Retorno
    }
    public function create($post):array{
        $id = $this->getLastId("Articles");
        $insertPost = array(
            [   
                '_id' => ($id==0?1:$id+1),
                'title' => $post->title,
                'body' => $post->body,
                'created' => time(),
                'modified'=>time(),
                'author'=>$post->author
            ],
        );
        if ($id<=0) {
            $this->getDb()->Articles->insertMany($insertPost);
            $id = 1;
        } else {
            $filter  = [];
            $options = ['sort' => ['_id' => -1], 'limit' => 1];
            $doc = $this->getDb()->Articles->findOne($filter, $options);
            $id=$doc->_id+1;
            $this->getDb()->Articles->insertMany($insertPost);
            $this->getDb()->Articles->updateOne(
                [ '_id' => $id ],
                [ '$set' => [ '_id' =>$id ]]
            );
        }
        return array('status'=>'success','id_post'=>$id);
    }
}
