<?php

namespace App\Dao;

use App\Database\Database;
use App\Model\Users;

class UsersDao
{


    public function get($email, $senha)
    {
        $conn = $this->getConn();
        $consulta = $conn->prepare("SELECT * FROM users WHERE email = :email AND senha = :senha;");
        $consulta->bindParam(':email', $email, \PDO::PARAM_STR);
        $consulta->bindParam(':senha', $senha, \PDO::PARAM_STR);
        $consulta->execute();

        $row = $consulta->fetch(\PDO::FETCH_OBJ);

        return $row->email != null;
    
    }

    private function getConn()
    {
        return Database::conexao();
    }
}