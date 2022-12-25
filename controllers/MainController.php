<?php

class MainController extends AbstractController
{
    public function index(): void
    {
        $newsModel = $this->getModel('news');
        
        $allNews = $newsModel->getAllNews();
        
        $commentsModel = $this->getModel('comments');
        
        $allComments = $commentsModel->getAllComments();

        $this->render('main', ['allNews' => $allNews, 'allComments' => $allComments]);
      
    }
}
