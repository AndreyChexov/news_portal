<?php

    session_start();

     require_once 'connect.php';

    class UserEnter extends Connect {
        protected $login;
        protected $password;

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

    }



        class Validation extends UserEnter {
            public $errors = [];
            public $response;

            public function checkLog ($val) {
                if($val === '') {
                    $this->errors[] =  'login';
                }
            }

            public function checkPass ($val) {
                if($val === '') {
                    $this->errors[] = 'password';
                }
            }

            public function getCheckResult () {
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

        class CheckDataForEnter extends Validation {
            public $check;

            public $user;


            public function checkData ($log, $pass) {
                $pass = md5($pass);

                $this->check = mysqli_query($this->connect, "SELECT * FROM `users` WHERE `login` = '$log' AND `password` = '$pass'");

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



            $enter = new CheckDataForEnter();

            $enter->setDB();
            $enter->checkCon();

            $enter->setLogin(trim($_POST['login']));
            $enter->setPassword(trim($_POST['password']));

            $log = $enter->getLogin();
            $pass = $enter->getPassword();

            $enter->checkLog($log);
            $enter->checkPass($pass);

            $enter->getCheckResult();


            $enter->checkData($log, $pass);











//     $file = file_get_contents('db.json');
//
//     $list = json_decode($file, true);
//
//
//            foreach($list as $items) {
//
//                if($items['login'] === $login && $items['password'] === $password) {
//
//                            $response = [
//                                "status" => true
//                            ];
//
//                            echo json_encode($response);
//
//                            $_SESSION['user'] = $items['name'];
//
//                            break;
//
//                    }
//
//            }
//
//
//            foreach($list as $items) {
//
//                if($items['login'] !== $login && $items['password'] !== $password) {
//
//
//                        $response =  [
//                            "status" => false,
//                            "message" => 'Неверный логин или пароль',
//                        ];
//
//                        echo json_encode($response);
//
//                        break;
//
//                }
//        }

?>