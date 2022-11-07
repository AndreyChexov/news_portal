<?php

class UserData {
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
