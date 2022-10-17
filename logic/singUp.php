<?php
    session_start();
    require_once 'connect.php';

    class info {
        protected $login;
        protected $password;
        protected $confirm;
        protected $name;

        public function setLogin ($value) {
            $this->login = $value;
        }

        public function getLogin () {
            return $this->login;
        }

            public function setPassword ($value) {
                $this->password = $value;
            }

            public function getPassword () {
                return $this->password;
            }

                public function setConfirm ($value) {
                    $this->confirm = $value;
                }

                public function getConfirm () {
                    return $this->confirm;
                }

                    public function setName ($value) {
                        $this->name = $value;
                    }

                    public function getName () {
                        return $this->name;
                    }

    }

    $newUser = new info();

    $newUser->setLogin(preg_replace('/\s+/', '', $_POST['login']));
    $newLog = $newUser->getLogin();

    $newUser->setPassword(trim($_POST['password']));
    $newPass = $newUser->getPassword();

    $newUser->setConfirm(trim($_POST['confirm']));
    $newConf = $newUser->getConfirm();

    $newUser->setName(trim($_POST['name']));
    $newName = $newUser->getName();



    $patternName = '/^[а-яёa-zA-Z]+$/iu';



    $errors = [];

        if($newLog === '' || strlen($newLog) < 6) {
            $errors[] = 'login';
        }

        if($newPass === '' || strlen($newPass) < 6) {
            $errors[] = 'password';
        }

        if($newConf === '' || $newConf !== $newPass) {
            $errors[] = 'confirm';
        }


        if($newName === '' || strlen($newName) < 2 || !preg_match($patternName, $newName)) {
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



        $checkLogin = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$newLog'");

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
    


    if($newPass === $newConf) {
        $newPass = md5($newPass);

        mysqli_query($connect, "INSERT INTO `users` (`id`, `name`, `password`, `login`) VALUES (NULL, '$newName', '$newPass', '$newLog')");

        $response =  [
            "status" => true,
            "message" => 'Регистрация прошла успешно',
        ];

        echo json_encode($response);

        $user = [
            "login" => $newLog,
            "password" => $newPass,
            "name" => $newName
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