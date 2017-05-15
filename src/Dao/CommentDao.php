<?php

namespace App\Dao;

use App\Database\Database;
use App\Model\Comment;

class CommentDao
{

    public function listaComentariosPorNews($newsId)
    {
        $conn = $this->getConn();

        $consulta = $conn->prepare("SELECT * FROM comments WHERE news = :newsId ORDER BY ID DESC ;");
        $consulta->bindParam(':newsId', $newsId, \PDO::PARAM_INT);
        $consulta->execute();


        $commentList = [];

        while ($row = $consulta->fetch(\PDO::FETCH_OBJ)) {
            $comments = new Comment();
            $comments->setId($row->id);
            $comments->setNewsId($row->news);
            $comments->setNome($row->nome);
            $comments->setConteudo($row->conteudo);

            $commentList[] = $comments;
        }

        return $commentList;
    }


    public function save(Comment $comment)
    {
        return $this->insert($comment);
    }

    private function insert(Comment $comment)
    {
        $conn = $this->getConn();
        $prepare = $conn->prepare(
            "INSERT INTO comments (news, nome, conteudo) 
                      VALUES (:news, :nome, :conteudo)"
        );

        return $prepare->execute(array(
            ':news'             => $comment->getNewsId(),
            ':nome'             => $comment->getNome(),
            ':conteudo'         => $comment->getConteudo()

        ));
    }

    private function getConn()
    {
        return Database::conexao();
    }
}