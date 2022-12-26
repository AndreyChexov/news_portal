<?php 

class CommentsController extends AbstractController {

    public function index(): void
    {
        $comments = $this->getModel('comments');
        
        $text = $_POST['comment'];
        $author = $_SESSION['user']['name'];
        $time = date('l jS \of F Y h:i:s A');
        $page = $_POST['page'];


        $comments->sendCommentToDB($text, $author, $time, $page);
    }

}