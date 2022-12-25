<?php

class ValidationDataUser {
    protected $errors = [];
    protected $response;

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