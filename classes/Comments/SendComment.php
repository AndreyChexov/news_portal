<?php

    require '../Connection/Connect.php';
   

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


    // $newCom = new GetComment();

    // $newCom->setText();
    // $newCom->setAuthor();
    // $newCom->setTime();
    // $newCom->setPage();



    $text = $_POST['comment'];
    $author = $_SESSION['user']['name'];
    $time = date('l jS \of F Y h:i:s A');
    $page = $_POST['page'];

    $sendComment = new SendComment();

    $sendComment->valText($text);
    $sendComment->SendComments($time,$author,$text,Connect::getInstance()->getConnect(), $page);
