<?php

class GetNewsFromDB
{
    protected $result;
    protected $news;

    public function setRes ($connect) {
        $this->result = mysqli_query($connect, "SELECT * FROM `allNews`");
    }

    public function getRes () {
        return $this->result;
    }

}