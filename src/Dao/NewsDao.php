<?php

namespace App\Dao;

use App\Database\Database;
use App\Model\News;

class NewsDao
{
    private $commentDao;

    public function __construct()
    {
        $this->commentDao = new CommentDao();
    }

    public function listNews()
    {
        $conn = $this->getConn();
        $consulta = $conn->query("SELECT * FROM news");

        $newsList = [];

        while ($row = $consulta->fetch(\PDO::FETCH_OBJ)) {
            $news = new News();
            $news->setId($row->id);
            $news->setContent($row->content);
            $news->setDate(new \DateTime($row->date));
            $news->setHeadLineContent($row->headline_content);
            $news->setHeadLineImage($row->headline_image);
            $news->setTitle($row->title);
            $newsList[] = $news;
        }

        return $newsList;
    }

    public function get($id)
    {
        $conn = $this->getConn();
        $consulta = $conn->prepare("SELECT * FROM news WHERE id = :id;");
        $consulta->bindParam(':id', $id, \PDO::PARAM_INT);
        $consulta->execute();

        $row = $consulta->fetch(\PDO::FETCH_OBJ);

        $news = new News();
        $news->setId($row->id);
        $news->setContent($row->content);
        $news->setDate(new \DateTime($row->date));
        $news->setHeadLineContent($row->headline_content);
        $news->setHeadLineImage($row->headline_image);
        $news->setTitle($row->title);

        $comments = $this->commentDao->listaComentariosPorNews($row->id);
        $news->setComments($comments);


        return $news;
    }

    public function save(News $news)
    {
        return $this->insert($news);
    }

    private function insert(News $news)
    {
        $conn = $this->getConn();
        $prepare = $conn->prepare(
            "INSERT INTO news (content, date, headline_content, headline_image, title) 
                      VALUES (:content, :date, :headline_content, :headline_image, :title)"
        );
        $prepare->execute(array(
            ':content'          => $news->getContent(),
            ':date'             => $news->getDate()->format('Y-m-d H:i:s'),
            ':headline_content' => $news->getHeadLineContent(),
            ':headline_image'   => $news->getHeadLineImage(),
            ':title'            => $news->getTitle()

        ));

        return $conn->lastInsertId('news_id_seq1');
    }

    private function getConn()
    {
        return Database::conexao();
    }
}