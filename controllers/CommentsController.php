<?php 


class CommentsController extends AbstractController {

    public function index(): void
    {
    
        $comments = $this->getModel('comments');
        $page = $_POST['page'];
        $text = $_POST['comment'];
        
        $comments->saveCommentToDB($page, $text);
        
    }

    
}

