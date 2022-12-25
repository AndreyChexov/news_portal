<?php
require 'classes/Connection/Connect.php';
require 'classes/Pagination/Pagination.php';



$showAll = new Pagination('news_categories', Connect::getInstance()->getConnect(), 'Животные');

$data = $showAll->getData('Животные');
$page = $showAll->getPaginationNumber();






