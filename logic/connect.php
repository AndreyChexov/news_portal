<?php

class Connect {
    public $connect;

    public function setDB () {
        $this->connect = mysqli_connect('localhost', 'root','', 'news');
    }

    public function checkCon () {
        if(!$this->connect) {
            die('Database error');
        }
    }

}



