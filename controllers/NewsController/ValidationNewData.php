<?php

class ValidationNewData
{
    protected $errors = [];
    protected $response;

    public function authorVal ($val) {
        if($val === '') {
            $this->errors[] = 'author';
        }
    }

    public function nameVal ($val) {
        if($val === '') {
            $this->errors[] = 'name';
        }
    }

    public function dataVal ($val) {
        if(!$val) {
            $this->errors[] = 'data';
        }
    }

    public function textVal ($val) {
        if(!$val) {
            $this->errors[] = 'text';
        }
    }

    public function getValResult () {
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