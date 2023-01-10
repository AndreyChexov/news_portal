<?php 


class CommentsController extends AbstractController {

    public function index(): void
    {
    
        $comments = $this->getModel('comments');
        
       $comments->saveCommentToDB();
      
    }

    
}

