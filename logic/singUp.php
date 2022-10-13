<?php
    session_start();
    require_once 'connect.php';


    $login = preg_replace('/\s+/', '', $_POST['login']);
    $password = trim($_POST['password']);
    $confirm = trim($_POST['confirm']);
    $name = trim($_POST['name']);

    $patternName = '/^[а-яёa-zA-Z]+$/iu';



    $errors = [];

    if($login === '' || strlen($login) < 6) {
        $errors[] = 'login';
    } 

    if($password === '' || strlen($password) < 6) {
        $errors[] = 'password';
    }

    if($confirm === '' || $confirm !== $password) {
        $errors[] = 'confirm';
    }


    if($name === '' || strlen($name) < 2 || !preg_match($patternName, $name)) {
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
    



    if($password === $confirm) {
        $password = md5($password);

        mysqli_query($connect, "INSERT INTO `users` (`id`, `name`, `password`, `login`) VALUES (NULL, '$name', '$password', '$login')");

        $response =  [
            "status" => true,
            "message" => 'Регистрация прошла успешно',
        ];

        echo json_encode($response);

        $user = [
            "login" => $login,
            "password" => $password,
            "name" => $name
        ];

    }
    else {
            $response =  [
                "status" => false,
                "message" => 'Введите корректные данные',
            ];

            echo json_encode($response);
        }



//        $user = [
//        "login" => $login,
//        "password" => $password,
//        "email" => $email,
//        "name" => $name
//        ];
//
//
//        $file = file_get_contents('db.json');
//
//        $list = json_decode($file, true);
//
//                    foreach($list as $log) {
//
//                        if($log['login'] === $login) {
//                            $response =  [
//                                "status" => false,
//                                "message" => 'Такой логин уже существует'
//                            ];
//
//                            echo json_encode($response);
//
//                            die();
//                        }
//                    }
//
//
//
//                foreach($list as $usersEmail) {
//
//                    if($usersEmail['email'] === $email) {
//                        $response =  [
//                            "status" => false,
//                            "message" => 'Такой адрес электронной почты уже зарегистрирован'
//                        ];
//
//                        echo json_encode($response);
//
//                        die();
//                    }
//                }
//
//
//        $list[] = $user;
//
//        $postUser = file_put_contents('db.json', json_encode($list));
//
//        if(!empty($postUser)) {
//
//            $response =  [
//                        "status" => true,
//                        "message" => 'Регистрация прошла успешно',
//                    ];
//
//                    echo json_encode($response);
//
//
//
//        } else {
//            $response =  [
//                "status" => false,
//                "message" => 'Что-то пошло не так...',
//            ];
//
//            echo json_encode($response);
//
//        }


       

?>