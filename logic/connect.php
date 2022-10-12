<?php

    $connect = mysqli_connect('localhost', 'root','','news');

    if(!$connect) {
    die('Database error');
    }

?>