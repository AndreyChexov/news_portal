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


}

