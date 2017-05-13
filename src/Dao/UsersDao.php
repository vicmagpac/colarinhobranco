<?php

namespace App\Dao;

use App\Database\Database;
use App\Model\Users;

class UsersDao
{


    public function get($id)
    {
        $conn = $this->getConn();
        $consulta = $conn->prepare("SELECT * FROM users WHERE id = :id;");
        $consulta->bindParam(':id', $id, \PDO::PARAM_INT);
        $consulta->execute();

        $row = $consulta->fetch(\PDO::FETCH_OBJ);

        $user = new Users();
        $user->setId($row->id);
        $user->setEmail($row->email);

        return $user;
    }

    private function getConn()
    {
        return Database::conexao();
    }
}