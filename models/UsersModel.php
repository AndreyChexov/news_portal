<?php

class UsersModel {

    public function logIn ($login, $pass) {

        $connect = Connect::getInstance()->getConnect();
        

        $errors = [];

        if($login === '') {
                $errors[] =  'login';
            }
        
         if($pass === '') {
                $errors[] = 'password';
        }
        

        if(!empty($errors)) {
                $response =  [
                    "status" => false,
                    "type" => 1,
                    "message" => 'Проверьте правильность ввода данных',
                    "fields" => $errors
                ];

                echo json_encode($response);

                die();
            }
        
        $pass = md5($pass);
        $check = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$pass'");

        if(mysqli_num_rows($check) > 0) {

            $user = mysqli_fetch_assoc($check);

            $_SESSION['user'] = [
                "name" => $user['name']
            ];

            $response = [
                "status" => true
            ];


            echo json_encode($response);
        } else {
            $response = [
                "status" => false,
                "message" => 'Неверный логин или пароль'
            ];


            echo json_encode($response);
        }

    }


    public function createNewUser ($login, $pass, $confirm, $name) {

        $connect = Connect::getInstance()->getConnect();
        $errors = [];

        
            if( $login === '' || strlen($login) < 6) {
                $errors[] = 'login';
            }
        
    
       
            if($pass === '' || strlen($pass) < 6) {
                $errors[] = 'password';
            }
        
    
        
            if($confirm === '' || strlen($confirm) < 6) {
                $errors[] = 'confirm';
            }
        
    
        
            if($name === '' || strlen($name) < 6) {
                $errors[] = 'name';
            }
        
       
            if(!empty($errors)) {
                $response =  [
                    "status" => false,
                    "type" => 1,
                    "message" => 'Проверьте правильность ввода данных',
                    "fields" => $errors
                ];
    
                echo json_encode($response);
    
                die();
    
            }

            $checkLogin = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login'");
    
            if(mysqli_num_rows($checkLogin) > 0) {
                $response =  [
                    "status" => false,
                    "type" => 1,
                    "message" => 'Такой логин уже существует',
                    "fields" => ['login']
                ];
    
                echo json_encode($response);
    
                die();
            }
        
    
        
            if($pass === $confirm) {
    
                $pass = md5($pass);
    
                mysqli_query($connect, "INSERT INTO `users` (`id`, `name`, `password`, `login`) VALUES (NULL, '$name', '$pass', '$login')");
    
                $response =  [
                    "status" => true,
                    "message" => 'Регистрация прошла успешно',
                ];
    
                echo json_encode($response);

                
            } else {
                $response =  [
                    "status" => false,
                    "message" => 'Введите корректные данные',
                ];
    
                echo json_encode($response);
            }
        
    }

}