<?php


class NewsController extends AbstractController
{
    public function index(): void
    {   
        $newsModel = $this->getModel('news');
        
        $allNews = $newsModel->getAllNews();

        $this->render('news', ['allNews' => $allNews]);
   
    }
}
