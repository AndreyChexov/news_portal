<?php

class PaginationModel
{
    public function pagination () {

        $db = Connect::getInstance()->getConnect(); 
        $table = 'news_categories'; 
        $limit = 6;

        
            $count = "SELECT COUNT(*) FROM $table WHERE name_category = 'Животные'";
            $result = mysqli_query($db, $count);
            $total_record = mysqli_fetch_array($result)[0];
   
            $currentPage = isset($_GET['page']) ? (int)$_GET['page']:1;
  
    
            $offset = ($currentPage() * $limit) - $limit;
            $sql = "SELECT allNews.new_name, allNews.data, allNews.text, allNews.fon, allNews.author, allNews.id, categories.name_category FROM news_categories LEFT JOIN allNews ON (allNews.id = news_categories.id_new)  LEFT JOIN categories ON (categories.name_category = news_categories.category_name)  LIMIT $offset, $limit";
            return $data = mysqli_query($db, $sql);
           

            return $page = ceil($total_record / $limit);
    

}
}