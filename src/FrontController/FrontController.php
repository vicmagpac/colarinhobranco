<?php

namespace App\FrontController;

use App\ApplicationController\ApplicationControllerNews;
use App\ContextObject\ContextObject;
use App\Http\Request;

class FrontController
{
    private $viewData;
    private $viewFile;


    public function __construct()
    {
        $this->viewData = new \StdClass();
    }

    public function execute()
    {
        $request = new Request();
        $action = $request->getParametro('action');

        switch ($action) {
            case 'newsList':
                $applicationControllerNews = new ApplicationControllerNews();

                $this->viewData->news = $applicationControllerNews->listaNews();
                $this->viewFile = 'news/list';
                break;

            case 'newsShow':
                $applicationControllerNews = new ApplicationControllerNews();

                $newsId = $request->getParametro('id');

                $contextObject = new ContextObject();
                $contextObject->setParameter('newsId', $newsId);

                $this->viewData->news = $applicationControllerNews->retornarNewsPorId($contextObject);
                $this->viewFile = 'news/show';
                break;

            case 'newsForm':
                $this->viewFile = 'news/form';
                break;

            case 'newsSave':
                $contextObject = new ContextObject();
                $contextObject->setParameter('title', $request->getParametroPost('title'));
                $contextObject->setParameter('date', $request->getParametroPost('date'));
                $contextObject->setParameter('headlineContent', $request->getParametroPost('headline-content'));
                $contextObject->setParameter('content', $request->getParametroPost('content'));
                $contextObject->setParameter('headlineImage', $request->getParametroFile('headline-image'));

                $applicationControllerNews = new ApplicationControllerNews();
                $applicationControllerNews->salvarNews($contextObject);

                break;
        }


        $this->forward();

    }

    public function forward()
    {
        $viewData = $this->viewData;
        require_once 'view/'.$this->viewFile.'.php';
    }
}