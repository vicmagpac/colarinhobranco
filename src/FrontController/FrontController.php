<?php

namespace App\FrontController;

use App\InterceptingFilter\AuthenticationFilter;
use App\ApplicationController\ApplicationControllerNews;
use App\ApplicationController\ApplicationControllerUsers;
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

            case 'usersLogin':
                $this->viewData->titulo = 'Login';
                $this->viewFile = 'users/login';
                break;

            case 'newsList':
                $applicationControllerNews = new ApplicationControllerNews();

                $this->viewData->titulo = 'Lista de noticias';
                $this->viewData->news = $applicationControllerNews->listaNews();
                $this->viewFile = 'news/list';
                break;

            case 'newsShow':
                $applicationControllerNews = new ApplicationControllerNews();

                $newsId = $request->getParametro('id');

                $contextObject = new ContextObject();
                $contextObject->setParameter('newsId', $newsId);

                $this->viewData->titulo = 'Detalhes';
                $this->viewData->news = $applicationControllerNews->retornarNewsPorId($contextObject);
                $this->viewFile = 'news/show';
                break;

            case 'newsForm':
                $this->viewData->titulo = 'Formulário';
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
                $lastId = $applicationControllerNews->salvarNews($contextObject);

                $this->redirect('?action=newsShow&id='.$lastId);

                break;

            case 'auth':
                $contextObject = new ContextObject();
                $contextObject->setParameter('email', $request->getParametroPost('email'));
                $contextObject->setParameter('senha', $request->getParametroPost('senha'));

                $applicationControllerUsers = new ApplicationControllerUsers();
                if ($applicationControllerUsers->hasUser($contextObject)) {
                    session_start();
                    $this->redirect('?action=newsList');
                } else {
                    $this->redirect('?action=usersLogin');
                }
                
                break;
        }


        $this->forward();

    }

    private function forward()
    {
       /* $filter = new AuthenticationFilter();

        if (!$filter->doFilter()) 
        {
            $this->viewData->titulo = 'Login';
            $this->viewFile = 'users/login';
        }*/
        $viewData = $this->viewData;
        require_once 'view/'.$this->viewFile.'.php';
    }

    private function redirect($path)
    {
        $redirect = BASE_URL . $path;
        header("location:$redirect");
    }
}