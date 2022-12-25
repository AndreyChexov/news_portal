<?php

class GetComment
{
    protected $time, $author, $text, $page;


    public function setText ($val) {
        $this->text = $val;

    }

    public function getText () {
        return $this->text;
    }

    public function setTime ($val) {
        $this->time = $val;

    }

    public function getTime () {
        return $this->time;
    }

    public function setAuthor ($val) {
        $this->author = $val;

    }

    public function getAuthor () {
        return $this->author;
    }

    public function setPage ($val) {
        $this->page = $val;

    }

    public function getPage () {
        return $this->page;
    }



}