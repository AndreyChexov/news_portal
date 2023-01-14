<?php

class RegistrationController extends AbstractController
{
    public function index(): void
    {

        $this->render('registration');
      
    }

    public function newUser () {
        $users = $this->getModel('users');

        $name = trim($_POST['name']);
        $pass = trim($_POST['password']);
        $confirm = trim($_POST['confirm']);
        $login = preg_replace('/\s+/', '', $_POST['login']);

        $users->createNewUser($login, $pass, $confirm, $name);
    }
}