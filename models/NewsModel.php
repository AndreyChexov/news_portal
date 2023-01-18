<?php

class NewsModel
{
  
    public function getAllNews(): array
    {
        $connect = Connect::getInstance()->getConnect();

        $sql = mysqli_query($connect, "SELECT allNews.new_name, allNews.data, allNews.text, allNews.fon, allNews.author, allNews.id, categories.name_category FROM news_categories LEFT JOIN allNews ON (allNews.id = news_categories.id_new)  LEFT JOIN categories ON (categories.name_category = news_categories.category_name)");
        $result = [];
        while ($news = mysqli_fetch_assoc($sql)) {
            $result[] = [
               'new_name' => $news['new_name'],
               'fon' => $news['fon'],
               'data' => $news['data'],
               'text' => $news['text'],
               'author' => $news['author'],
               'id' => $news['id'],
               'category' => $news['name_category']     
            ];
            
        }

        return $result;
    }

    public function getAllNewsByCategory ($category) {
        $connect = Connect::getInstance()->getConnect();

        $sql = mysqli_query($connect, "SELECT allNews.new_name, allNews.data, allNews.text, allNews.fon, allNews.author, allNews.id, categories.name_category FROM news_categories LEFT JOIN allNews ON (allNews.id = news_categories.id_new)  LEFT JOIN categories ON (categories.name_category = news_categories.category_name)");
        $result = [];
        while ($news = mysqli_fetch_assoc($sql)) {
            if($news['name_category'] === $category){
                $result[] = [
                    'new_name' => $news['new_name'],
                    'fon' => $news['fon'],
                    'data' => $news['data'],
                    'text' => $news['text'],
                    'author' => $news['author'],
                    'id' => $news['id'],
                    'category' => $news['name_category']     
                 ];
            }
           
            
        }

        return $result;
    }
 
    
        public function saveNewsToDB ($data, $text, $author, $img, $fon, $name) {
            $connect = Connect::getInstance()->getConnect(); 
            $response = '';
            $errors = [];
    

                if($author === '') {
                    $errors[] = 'author';
                }
            

                if($name === '') {
                    $errors[] = 'newsName';
                }
            

                if(!$data) {
                    $errors[] = 'data';
                }
            
                if(!$text) {
                    $errors[] = 'text';
                }

                if(!$img) {
                    $errors[] = 'img';
                }

                if(!$fon) {
                    $errors[] = 'fon_img';
                }
            

            
                if(!empty($errors)) {
                    $response =  [
                        "status" => false,
                        "type" => 1,
                        "message" => 'Проверьте правильность ввода данных',
                        "fields" => $errors
                    ];

                    echo json_encode($response);

                    die();

                }

            if(mysqli_query($connect, "INSERT INTO `allNews` (`data`, `text`, `author`, `img`, `id`, `fon`, `new_name`) VALUES ('$data', '$text', '$author', '$img', NULL, '$fon', '$name')")) {
    
                  $response =  [
                    "status" => true,
                    "message" => 'Статья успешно создана',
                ];
    
                echo json_encode($response);
            }
            else {
                $response =  [
                    "status" => false,
                    "message" => 'Заполните все поля',
                ];
    
                echo json_encode($response);
            }
        }
    
    
    

}
