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

}
