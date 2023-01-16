<?php

class CommentsModel 

{

    public function getAllComments(): array
    {
        $connect = Connect::getInstance()->getConnect();

        $sql = mysqli_query($connect, "SELECT * FROM `comments`");
        $result = [];
        while ($comments = mysqli_fetch_assoc($sql)) {
            $result[] = [
                'id' => $comments['id'],
                'text' => $comments['text'],
                'author' => $comments['author'],
                'time' => $comments['time'],
                'page' => $comments['page']
               
            ];
            
        }

        return $result;
    }

   

    public function saveCommentToDB ($page, $text)
     {
        
        $connect = Connect::getInstance()->getConnect();
        
       
        $author = $_SESSION['user']['name'];
        $time = date('l jS \of F Y h:i:s A');
        
        if($text === '') {
            $response =  [
                "status" => false,
            ];

            echo json_encode($response);

            die();
        }
       
        if($_SESSION['user']['name']) {

            mysqli_query($connect, "INSERT INTO `comments` (`id`, `text`, `author`, `time`, `page`) VALUES (NULL, '$text', '$author', '$time', '$page')");

            $response =  [
                "status" => true,
            ];

            echo json_encode($response);
        } else
        {
            $response =  [
                "status" => false,
            ];

            echo json_encode($response);
        }

        
    }

}

