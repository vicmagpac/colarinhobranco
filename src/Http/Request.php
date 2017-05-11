<?php

namespace App\Http;


class Request
{
    public function getParametro($parametro = null)
    {
        if (!is_null($parametro)) {
            return $_GET[$parametro];
        }

        return $_GET;
    }

    public function getParametroPost($parametro = null)
    {
        if (!is_null($parametro)) {
            return $_POST[$parametro];
        }

        return $_POST;
    }

    public function getParametroFile($parametro = null)
    {
        if (!is_null($parametro)) {
            return $_FILES[$parametro];
        }

        return $_FILES;
    }
}