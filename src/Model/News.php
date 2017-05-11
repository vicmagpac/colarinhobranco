<?php

namespace App\Model;

class News
{
    private $id;
    private $title;
    private $content;
    private $date;
    private $headLineContent;
    private $headLineImage;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param DateTime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getHeadLineContent()
    {
        return $this->headLineContent;
    }

    /**
     * @param mixed $headLineContent
     */
    public function setHeadLineContent($headLineContent)
    {
        $this->headLineContent = $headLineContent;
    }

    /**
     * @return mixed
     */
    public function getHeadLineImage()
    {
        return $this->headLineImage;
    }

    /**
     * @param mixed $headLineImage
     */
    public function setHeadLineImage($headLineImage)
    {
        $this->headLineImage = $headLineImage;
    }
}