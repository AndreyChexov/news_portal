<?php

class Pagination
{
    private $db, $table, $total_record, $limit = 6;

    public function __construct($table, $connect)
    {
        $this->table = $table;
        $this->db = $connect;
        $this->setTotalRecords();
    }

    public function setTotalRecords () {
        $count = "SELECT COUNT(*) FROM $this->table";
        $result = mysqli_query($this->db, $count);
        $this->total_record = mysqli_fetch_array($result)[0];
    }

    public function currentPage () {
        return isset($_GET['page']) ? (int)$_GET['page']:1;
    }

    public function getData () {

        $offset = ($this->currentPage() * $this->limit) - $this->limit;
        $sql = "SELECT * FROM $this->table LIMIT $offset, $this->limit";
        return mysqli_query($this->db, $sql);

    }

    public function getPaginationNumber () {
        return ceil($this->total_record / $this->limit);
    }


}