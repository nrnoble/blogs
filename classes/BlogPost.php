<?php
/**
 * Neal Noble
 * Course: IT 328 - Full-Stack Web Development
 * Assignment: Blogs
 * May 2017
 * Instructor: Tina Ostrander
 */


class BlogPost
{
    /**
     * @var
     */
    private $blogid;
    /**
     * @var
     */
    private $date;
    /**
     * @var
     */
    private $title;
    /**
     * @var
     */
    private $blog;

    /**
     * BlogPost constructor.
     * @param $blogid
     * @param $date
     * @param $title
     * @param $blog
     */
    public function __construct($blogid, $date, $title, $blog)
    {
        $this->blogid = $blogid;
        $this->date = $date;
        $this->title = $title;
        $this->blog = $blog;
    }

    /**
     * @return mixed
     */
    public function getBlogid()
    {
        return $this->blogid;
    }

    /**
     * @param mixed $blogid
     */
    public function setBlogid($blogid)
    {
        $this->blogid = $blogid;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
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
    public function getBlog()
    {
        return $this->blog;
    }

    /**
     * @param mixed $blog
     */
    public function setBlog($blog)
    {
        $this->blog = $blog;
    }



}