<?php

    class NewUser {
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



