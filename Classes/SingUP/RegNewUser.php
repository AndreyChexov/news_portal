<?php

    namespace news\Classes\SingUP;
    require 'NewUser.php';
    require 'ValidationUser.php';
    require '../Connection/Connect.php';

    session_start();



class RegNewUser extends ValidationUser {

    protected $checkLogin;
    protected $user;

    public function setCheckLog ($connect, $log) {
        $this->checkLogin = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$log'");
    }

    public function checkLoginRR () {
        if(mysqli_num_rows($this->checkLogin) > 0) {
            $this->response =  [
                "status" => false,
                "type" => 1,
                "message" => 'Такой логин уже существует',
                "fields" => ['login']
            ];

            echo json_encode($this->response);

            die();
        }
    }

    public function enterTokab ($pass, $conf, $name, $log, $connect) {
        if($pass === $conf) {

            $pass = md5($pass);

            mysqli_query($connect, "INSERT INTO `users` (`id`, `name`, `password`, `login`) VALUES (NULL, '$name', '$pass', '$log')");

            $this->response =  [
                "status" => true,
                "message" => 'Регистрация прошла успешно',
            ];

            echo json_encode($this->response);

            $this->user = [
                "login" => $pass,
                "password" => $pass,
                "name" => $name
            ];

        } else {
            $this->response =  [
                "status" => false,
                "message" => 'Введите корректные данные',
            ];

            echo json_encode($this->response);
        }
    }

}


    $regNewUser = new RegNewUser();
    $newUser = new NewUser();
    $valid = new ValidationUser();
    $connection = new \Connect();


    $connection->setDB();
    $connection->checkCon();
    $connect = $connection->connect;

    $newUser->setName(trim($_POST['name']));
    $newUser->setPassword(trim($_POST['password']));
    $newUser->setConfirm(trim($_POST['confirm']));
    $newUser->setLogin(preg_replace('/\s+/', '', $_POST['login']));

    $log = $newUser->getLogin();
    $pass = $newUser->getPassword();
    $name = $newUser->getName();
    $conf = $newUser->getConfirm();

    $valid->valLog($log);
    $valid->valPass($pass);
    $valid->valName($name);
    $valid->valConf($conf);
    $valid->getResultOfVal();


    $regNewUser->setCheckLog($connect, $log);
    $regNewUser->checkLoginRR();
    $regNewUser->enterTokab($pass,$conf,$name,$log,$connect);