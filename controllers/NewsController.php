<?php


class NewsController extends AbstractController

{
   
    public function index(): void
    {   
        
        $newsModel = $this->getModel('news');
        $allNews = $newsModel->getAllNews();

    
        $this->render('news', ['allNews' => $allNews]);
   
    }

    public function animals (): void {
        $newsModel = $this->getModel('news');
        
        $allNews = $newsModel->getAllNews();

        $this->render('animals', ['allNews' => $allNews]);
    }
    
    public function cities (): void {
        $newsModel = $this->getModel('news');
        
        $allNews = $newsModel->getAllNews();
    
        
        $this->render('cities', ['allNews' => $allNews]);
    }

    public function cars (): void {
        $newsModel = $this->getModel('news');
        
        $allNews = $newsModel->getAllNews();
    
        
        $this->render('cars', ['allNews' => $allNews]);
    }

            public function single () {

                $newsModel = $this->getModel('news');
                
                $allNews = $newsModel->getAllNews();
                
                $commentsModel = $this->getModel('comments');
                
                $allComments = $commentsModel->getAllComments();

                $this->render('main', ['allNews' => $allNews, 'allComments' => $allComments]);
            }
}
