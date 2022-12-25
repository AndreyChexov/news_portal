<?php
session_start();

class LogOutController extends AbstractController
{
    public function index(): void
    {

        unset($_SESSION['user']);

        header('Location: http://localhost/news/index.php?path=news');
      
    }
}
