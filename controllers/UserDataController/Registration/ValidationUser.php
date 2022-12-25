<?php


class ValidationUser {
    protected $errors = [];
    protected $response;


    public function valLog ($log) {
        if( $log === '' || strlen($log) < 6) {
            $this->errors[] = 'login';
        }
    }

    public function valPass ($pass) {
        if($pass === '' || strlen($pass) < 6) {
            $this->errors[] = 'password';
        }
    }

    public function valConf ($conf) {
        if($conf === '' || strlen($conf) < 6) {
            $this->errors[] = 'confirm';
        }
    }

    public function valName ($name) {
        if($name === '' || strlen($name) < 6) {
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
