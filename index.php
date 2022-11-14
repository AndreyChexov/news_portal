<?php
    require 'Classes/Connection/Connect.php';
    require 'Classes/Pagination/Pagination.php';
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="style/style.scss" rel="stylesheet" type="text/css">
    <link href="style/styleAuth.scss" rel="stylesheet" type="text/css">
    <title>News</title>
</head>
<body>
        <? require 'Classes/Header.php'?>

        <section class="news">


                <div class="news_wrapper container">
                    <div class="main_news">
                        <?php
                        Connect::getInstance()->setDB();
                        Connect::getInstance()->checkCon();
                        $connect = Connect::getInstance()->connect;

                        $pagination = new Pagination('allNews', $connect);
                        $news = $pagination->getData();
                        $page = $pagination->getPaginationNumber();


                        function show ($val) {

                                while( $news = mysqli_fetch_assoc($val)) {

                                    switch ($news) {
                                        case 'animals':
                                        if($news['categories'] == 'animals') {
                                            require 'Classes/ShowAnimals.php';
                                        }
                                        break;
                                        case 'cities':
                                            if($news['categories'] == 'cities') {
                                                require 'Classes/ShowCities.php';
                                            }
                                            break;
                                        default:
                                            require 'Classes/ShowAllNews.php';
                                            break;
                                    }

                                    }
                                }

                        show($news);

                        ?>
                    </div>
                </div>

        </section>
        <div class='news_pagination'>
            <? for ($i = 1; $i <= $page; $i++ ): ?>
                <a href="?page=<? echo $i; ?>"> <? echo $i; ?></a>
            <? endfor; ?>
        </div>


    <? require 'Classes/Footer.php';?>

        <script src='js/jquery-3.4.1.min.js'></script>
        <script src='js/jsAuth/index.js'></script>
</body>
</html>