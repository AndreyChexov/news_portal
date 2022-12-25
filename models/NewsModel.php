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


}
