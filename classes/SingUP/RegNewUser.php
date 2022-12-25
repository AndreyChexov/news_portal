<?php
session_start();

    require '../../controllers/UserDataController/Registration/NewUser.php';
    require '../../controllers/UserDataController/Registration/ValidationUser.php';
    require '../Connection/Connect.php';


class RegNewUser {

    protected $checkLogin, $user, $response;


    public function checkLoginRR ($connect, $log) {
        $this->checkLogin = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$log'");

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

    public function saveUser ($pass, $conf, $name, $log, $connect) {
        if($pass === $conf) {

            $pass = md5($pass);

            mysqli_query($connect, "INSERT INTO `users` (`id`, `name`, `password`, `login`) VALUES (NULL, '$name', '$pass', '$log')");

            $this->response =  [
                "status" => true,
                "message" => 'Регистрация прошла успешно',
            ];

            echo json_encode($this->response);

            $this->user = [
                "login" => $log,
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


    $regNewUser->checkLoginRR(Connect::getInstance()->getConnect(), $log);
    $regNewUser->saveUser($pass,$conf,$name,$log,Connect::getInstance()->getConnect());