<?php

class UsersModel {

    protected $check;
    protected $user;
    protected $response;


        public function logIn ($log, $pass, $connect) {
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





        public function checkLogin ($connect, $log) {

            
            $user = '';
            $response = '';
            $checkLogin = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$log'");
    
            if(mysqli_num_rows($checkLogin) > 0) {
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
    
        public function saveUserToDB ($pass, $conf, $name, $log, $connect) {

            $response = '';
            
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