<?php

class CitiesController extends AbstractController
{
    public function index(): void
    {
        $newsModel = $this->getModel('news');
        
        $allNews = $newsModel->getAllNews();        

        $this->render('cities', ['allNews' => $allNews]);
    }
}