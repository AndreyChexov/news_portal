<?php

class AuthController extends AbstractController
{
    public function index(): void
    {
        $this->render('auth');
    }
}