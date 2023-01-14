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

    public function saveNews() {

        $newsModel = $this->getModel('news');

        $data = $_POST['data'];
        $text = nl2br($_POST['text']);
        $name = $_POST['newsName'];
        $author = $_POST['author'];
        if(!empty($_POST['img'])) {
            $img = 'assets/img/' . time() . $_FILES['img']['name'];
        } else {
            $img = '';
        }
        
        if(!empty($_POST['fon_img'])) {
            $fon = 'assets/img/' . time() . $_FILES['fon_img']['name'];
        } else {
            $fon = '';
        }
         
        

        $newsModel->saveNewsToDB($data, $text, $author, $img, $fon, $name);
    }
}
