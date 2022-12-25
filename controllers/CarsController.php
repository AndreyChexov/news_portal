<?php

class CarsController extends AbstractController
{
    public function index(): void
    {
        $newsModel = $this->getModel('news');
        
        $allNews = $newsModel->getAllNews();

        $this->render('cars', ['allNews' => $allNews]);
      
    }
}
