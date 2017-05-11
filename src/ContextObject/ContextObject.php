<?php

namespace App\ContextObject;

class ContextObject
{
    private $object;

    public function __construct()
    {
        $this->object = new \stdClass();
    }

    public function setParameter($attr, $value)
    {
        $this->object->$attr = $value;
    }

    public function getParameter($attr)
    {
        return $this->object->$attr;
    }
}