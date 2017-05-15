<?php

namespace App\ApplicationController;

use App\ContextObject\ContextObject;
use App\Dao\CommentDao;
use App\Dao\NewsDao;
use App\Model\Comment;
use App\Model\News;
use App\Utils\FileUpload;

class ApplicationControllerNews
{
    private $newsDao;
    private $commentDao;

    public function __construct()
    {
        $this->newsDao = new NewsDao();
        $this->commentDao = new CommentDao();
    }

    public function listaNews()
    {
        return $this->newsDao->listNews();
    }

    public function retornarNewsPorId(ContextObject $contextObject)
    {
        $id = $contextObject->getParameter('newsId');
        return $this->newsDao->get($id);
    }

    public function salvarNews(ContextObject $contextObject)
    {
        $news = new News();
        $news->setTitle($contextObject->getParameter('title'));
        $news->setDate(new \DateTime($contextObject->getParameter('date')));
        $news->setHeadLineContent($contextObject->getParameter('headlineContent'));
        $news->setContent($contextObject->getParameter('content'));

        $fileUpload = new FileUpload();
        $fileName = $fileUpload->enviar($contextObject->getParameter('headlineImage'));
        $news->setHeadLineImage($fileName);

        return $this->newsDao->save($news);
    }

    public function salvarComentario(ContextObject $contextObject)
    {
        $comment = new Comment();
        $comment->setNewsId($contextObject->getParameter('news'));
        $comment->setNome($contextObject->getParameter('nome'));
        $comment->setConteudo($contextObject->getParameter('conteudo'));

        return $this->commentDao->save($comment);
    }
}