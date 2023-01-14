<?php

class AuthController extends AbstractController
{
    public function index(): void
    {
        $this->render('auth');
         
    }

    public function log () {

        $users = $this->getModel('users');
        $login = trim($_POST['login']);
    
        $pass = trim($_POST['password']);

        $users->LogIn($login, $pass);

    }
}