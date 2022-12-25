<?php

class AnimalsController extends AbstractController
{
    public function index(): void
    {
        $newsModel = $this->getModel('news');
        
        $allNews = $newsModel->getAllNews();  

        $this->render('animals', ['allNews' => $allNews]);
    }
}