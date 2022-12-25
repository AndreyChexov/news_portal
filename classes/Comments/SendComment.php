<?php

    require '../Connection/Connect.php';
    require '../../controllers/CommentsController/GetComment.php';
    session_start();

class SendComment
{
    protected $response;

    public function valText ($val) {
        if($val === '') {
            $this->response =  [
                "status" => false,
            ];

            echo json_encode($this->response);

            die();
        }
    }

    public function SendComments ($time, $author, $text, $connect, $page) {
        if($_SESSION['user']['name']) {

            mysqli_query($connect, "INSERT INTO `comments` (`id`, `text`, `author`, `time`, `page`) VALUES (NULL, '$text', '$author', '$time', '$page')");

            $this->response =  [
                "status" => true,
            ];

            echo json_encode($this->response);
        } else
        {
            $this->response =  [
                "status" => false,
            ];

            echo json_encode($this->response);
        }

    }



}


    $newCom = new GetComment();

    $newCom->setText($_POST['comment']);
    $newCom->setAuthor($_SESSION['user']['name']);
    $newCom->setTime(date('l jS \of F Y h:i:s A'));
    $newCom->setPage($_POST['page']);



    $text = $newCom->getText();
    $author = $newCom->getAuthor();
    $time = $newCom->getTime();
    $page = $newCom->getPage();

    $sendComment = new SendComment();

    $sendComment->valText($text);
    $sendComment->SendComments($time,$author,$text,Connect::getInstance()->getConnect(), $page);
