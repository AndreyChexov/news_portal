<?php

class GetNewsFromDB
{
    protected $result;
    protected $comments;
    protected $news;

    public function setRes ($connect) {
        $this->result = mysqli_query($connect, "SELECT * FROM `allNews`");
    }
    public function setComments ($connect) {
        $this->comments = mysqli_query($connect, "SELECT * FROM `comments`");
    }

    public function getComments () {
        return $this->comments;
    }

    public function getRes () {
        return $this->result;
    }

}

$newData = new GetNewsFromDB();

$newData->setComments(Connect::getInstance()->getConnect());
$comments = $newData->getComments();
$newData->setRes(Connect::getInstance()->getConnect());
$news = $newData->getRes();