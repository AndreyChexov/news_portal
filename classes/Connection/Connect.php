<?php

 class Connect {
    public $connect;
    private static $instance = null;

     public static function getInstance()
     {
         if (null === self::$instance)
         {
             self::$instance = new self();
         }
         return self::$instance;
     }
     private function __clone() {}
     private function __construct() {}

    public function setDB () {
        $this->connect = mysqli_connect('localhost', 'root','', 'news');
    }

    public function getConnect () {
         return $this->connect;
    }

    public function checkCon () {
        if(!$this->connect) {
            die('Database error');
        }
    }

}

Connect::getInstance()->setDB();
Connect::getInstance()->checkCon();
Connect::getInstance()->getConnect();