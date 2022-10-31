<?php
    session_start();
    require_once 'connect.php';

    class InfoUser extends Connect {
        protected $login;
        protected $password;
        protected $confirm;
        protected $name;

        public function setLogin ($val) {
            $this->login = $val;
        }

        public function getLogin () {
            return $this->login;
        }

            public function setPassword ($val) {
                $this->password = $val;
            }

            public function getPassword () {
                return $this->password;
            }

                public function setConfirm ($val) {
                    $this->confirm = $val;
                }

                public function getConfirm () {
                    return $this->confirm;
                }

                    public function setName ($val) {
                        $this->name = $val;
                    }

                    public function getName () {
                        return $this->name;
                    }

    }



    class ValidationUser extends InfoUser {
        protected $errors = [];
        public $response;
        public $patternName;

        public function setpattern()
        {
          $this->patternName = '/^[а-яёa-zA-Z]+$/iu';
        }


        public function valLog ($val) {
            if($val === '' || strlen($val) < 6) {
                $this->errors[] = 'login';
            }
        }

        public function valPass ($val) {
            if($val === '' || strlen($val) < 6) {
                $this->errors[] = 'password';
            }
        }

        public function valConf ($val) {
            if($val === '' || strlen($val) < 6) {
                $this->errors[] = 'confirm';
            }
        }

        public function valName ($val) {
            if($val === '' || strlen($val) < 6) {
                $this->errors[] = 'name';
            }
        }

        public function getResultOfVal () {
            if(!empty($this->errors)) {
                $this->response =  [
                    "status" => false,
                    "type" => 1,
                    "message" => 'Проверьте правильность ввода данных',
                    "fields" => $this->errors
                ];

                echo json_encode($this->response);

                die();

            }
        }
    }
//        $errors = [];
//
//
//
//
//
//        if($newConf === '' || $newConf !== $newPass) {
//            $errors[] = 'confirm';
//        }
//
//
//        if($newName === '' || strlen($newName) < 2 || !preg_match($patternName, $newName)) {
//            $errors[] = 'name';
//        }
//
//        if(!empty($errors)) {
//            $response =  [
//                "status" => false,
//                "type" => 1,
//                "message" => 'Проверьте правильность ввода данных',
//                "fields" => $errors
//            ];
//
//            echo json_encode($response);
//
//            die();
//
//        }

        class CheckEnterErrors extends ValidationUser {

            protected $checkLogin;
            public $user;

            public function setCheckLog ($val) {
                $this->checkLogin = mysqli_query($this->connect, "SELECT * FROM `users` WHERE `login` = '$val'");
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

            public function enterTokab () {
                if($this->password === $this->confirm) {
                    $this->password = md5($this->password);

                    mysqli_query($this->connect, "INSERT INTO `users` (`id`, `name`, `password`, `login`) VALUES (NULL, '$this->name', '$this->password', '$this->login')");

                    $this->response =  [
                        "status" => true,
                        "message" => 'Регистрация прошла успешно',
                    ];

                    echo json_encode($this->response);

                    $this->user = [
                        "login" => $this->password,
                        "password" => $this->password,
                        "name" => $this->name
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



        $enter = new CheckEnterErrors();

        $enter->setDB();
        $enter->checkCon();

        $enter->setLogin(preg_replace('/\s+/', '', $_POST['login']));


        $enter->setPassword(trim($_POST['password']));


        $enter->setConfirm(trim($_POST['confirm']));


        $enter->setName(trim($_POST['name']));

        $log = $enter->getLogin();
        $pass = $enter->getPassword();
        $conf = $enter->getConfirm();
        $name = $enter->getName();

        $enter->valLog($log);
        $enter->valPass($pass);
        $enter->valConf($conf);
        $enter->valName($name);

        $enter->getResultOfVal();
        $enter->setCheckLog($log);
        $enter->checkLoginRR();

        $enter->enterTokab();

//        $checkLogin = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$newLog'");
//
//        if(mysqli_num_rows($checkLogin) > 0) {
//            $response =  [
//                "status" => false,
//                "type" => 1,
//                "message" => 'Такой логин уже существует',
//                "fields" => ['login']
//            ];
//
//            echo json_encode($response);
//
//            die();
//
//        }
//
//
//
//    if($newPass === $newConf) {
//        $newPass = md5($newPass);
//
//        mysqli_query($connect, "INSERT INTO `users` (`id`, `name`, `password`, `login`) VALUES (NULL, '$newName', '$newPass', '$newLog')");
//
//        $response =  [
//            "status" => true,
//            "message" => 'Регистрация прошла успешно',
//        ];
//
//        echo json_encode($response);
//
//        $user = [
//            "login" => $newLog,
//            "password" => $newPass,
//            "name" => $newName
//        ];
//
//    }
//    else {
//            $response =  [
//                "status" => false,
//                "message" => 'Введите корректные данные',
//            ];
//
//            echo json_encode($response);
//        }



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
