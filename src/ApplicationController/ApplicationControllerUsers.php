<?php

namespace App\ApplicationController;

use App\ContextObject\ContextObject;
use App\Dao\UsersDao;
use App\Model\Users;

class ApplicationControllerUsers
{
    private $usersDao;

    public function __construct()
    {
        $this->usersDao = new UsersDao();
    }

    public function hasUser(ContextObject $contextObject)
    {
        $email = $contextObject->getParameter('email');
        $senha = $contextObject->getParameter('senha');
        return $this->usersDao->get($email, $senha);
    }
}