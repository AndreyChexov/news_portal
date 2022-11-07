<?php
    session_start();
    require 'UserData.php';
    require 'ValidationDataUser.php';
    require '../Connection/Connect.php';

    class CheckUserData
        {
        protected $check;
        protected $user;
        protected $response;


        public function checkData ($log, $pass, $connect) {
            $pass = md5($pass);

            $this->check = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$log' AND `password` = '$pass'");

            if(mysqli_num_rows($this->check) > 0) {

                $this->user = mysqli_fetch_assoc($this->check);

                $_SESSION['user'] = [
                    "name" => $this->user['name']
                ];

                $this->response = [
                    "status" => true
                ];


                echo json_encode($this->response);
            } else {
                $this->response = [
                    "status" => false,
                    "message" => 'Неверный логин или пароль'
                ];


                echo json_encode($this->response);
            }

        }

    }


    $newConnect = new Connect();
    $newConnect->setDB();
    $newConnect->checkCon();
    $connect = $newConnect->connect;

    $user = new UserData();
    $valid = new ValidationDataUser();
    $checkData = new CheckUserData();


    $user->setLogin(trim($_POST['login']));
    $user->setPassword(trim($_POST['password']));

    $log = $user->getLogin();
    $pass = $user->getPassword();

    $valid->checkPass($pass);
    $valid->checkLog($log);
    $valid->getCheckResult();

    $checkData->checkData($log, $pass, $connect);
