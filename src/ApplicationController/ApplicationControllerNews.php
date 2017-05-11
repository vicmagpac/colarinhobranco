<?php

namespace App\ApplicationController;

use App\ContextObject\ContextObject;
use App\Dao\NewsDao;
use App\Model\News;
use App\Utils\FileUpload;

class ApplicationControllerNews
{
    private $newsDao;

    public function __construct()
    {
        $this->newsDao = new NewsDao();
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
}