<?php
namespace App\Repository;

use App\Exception\TokenException;
use \Firebase\JWT\JWT;

final class TokenRepository
{
    private  $database;

    public function __construct( $database)
    {
        $this->database = $database;
    }

    public function getDb()
    {
        return $this->database;
    }
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
    public function getToken($data): object
    {
        $user = $this->getDb()->users->findOne(['user' => $data->user,'pass'=>MD5($data->pass)]);
        $token = 'invalido';
        if(!is_null($user) && (MD5($data->pass) === $user->pass)){
            $post = 'success';
            $secretKey = $_SERVER['SECRET_KEY'];
            $jwt = JWT::encode($user, $secretKey);
            $token = json_decode((string) json_encode(array('status'=>'success','token'=>$jwt)), false);
        }else{
            throw new TokenException('Token não gerao', 404);
        }
        return $token;
    }
    public function create($data): array
    {
        $result = '';
        if ($data->user === null || $data->user === '') {
            throw new TokenException('Usuario deve ser preenchiddo', 404);
        }elseif ($data->pass === null || $data->pass === '') {
            throw new TokenException('Senha deve ser preenchiddo', 404);
        }
        $user = $this->getDb()->users->findOne(['user' => $data->user]);
        if(is_null($user)){
            $id = $this->getLastId("users");
            $insertUser = array(
                [   
                    '_id' => ($id==0?1:$id+1),
                    'user' => $data->user,
                    'pass' => MD5($data->pass),
                    'created' => time()
                ],
            );
            if ($id<=0) {
                $this->getDb()->users->insertMany($insertUser);
                $id = 1;
            } else {
                $filter  = [];
                $options = ['sort' => ['_id' => -1], 'limit' => 1];
                $doc = $this->getDb()->users->findOne($filter, $options);
                $id=$doc->_id+1;
                $this->getDb()->users->insertMany($insertUser);
                $this->getDb()->users->updateOne(
                    [ '_id' => $id ],
                    [ '$set' => [ '_id' =>$id ]]
                );
            }
            $result = array('status'=>'success','message'=>'Usuario cadastrado com sucesso','user_id'=>$id);
        }else{
            $result = array('status'=>'fail','message'=>'Usuario já cadastrado');
        }
        return $result;
        // return  json_decode((string) json_encode(array('status'=>'success','token'=>$user)), false);
    }

}
