<?php

class Pagination
{
    protected $db, $table, $total_record, $limit = 6;

    public function __construct($table, $category)
    {
        $connect = Connect::getInstance()->getConnect();
        $this->table = $table;
        $this->db = $connect;
        $this->setTotalRecords($category);
    }

    public function setTotalRecords ($category) {
        $count = "SELECT COUNT(*) FROM $this->table WHERE name_category = '$category'";
        $result = mysqli_query($this->db, $count);
        $this->total_record = mysqli_fetch_array($result)[0];
    }

    public function currentPage () {
        return isset($_GET['page']) ? (int)$_GET['page']:1;
    }

    public function getData ($category) {

        $offset = ($this->currentPage() * $this->limit) - $this->limit;
        $sql = "SELECT allNews.new_name, allNews.data, allNews.text, allNews.fon, allNews.author, allNews.id, categories.name_category FROM news_categories LEFT JOIN allNews ON (allNews.id = news_categories.id_new)  LEFT JOIN categories ON ($category = news_categories.category_name)  LIMIT $offset, $this->limit";
        return mysqli_query($this->db, $sql);
    }

    public function getPaginationNumber () {
        return ceil($this->total_record / $this->limit);
    }

}