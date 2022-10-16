<?php

    session_start();

     require_once 'connect.php';

    class UserEnter {
        protected $login = '';
        protected $password = '';

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

        $userForEnter  = new UserEnter();

        $userForEnter->setLogin(trim($_POST['login']));
        $newlog = $userForEnter->getLogin();

        $userForEnter->setPassword(trim($_POST['password']));
        $newPass = $userForEnter->getPassword();

         $errors = [];


        if($newlog === '') {
            $errors[] = 'login';
        }

        if($newPass === '') {
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

   

     $newPass = md5($newPass);


     $check = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$newlog' AND `password` = '$newPass'");
        
    
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