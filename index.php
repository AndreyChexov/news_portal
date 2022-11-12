<?php
    require 'Classes/Connection/Connect.php';
    require_once 'Classes/Pagination/Pagination.php';

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
                        $newConnection = new Connect();
                        $newConnection->setDB();
                        $newConnection->checkCon();
                        $connect = $newConnection->connect;

                        $pagination = new Pagination('allNews', $connect);
                        $news = $pagination->getData();
                        $page = $pagination->getPaginationNumber();


                        function show ($val) {

                                while( $news = mysqli_fetch_assoc($val)) {


                            ?>


                            <div class="main_news_card" style="background-image: url('<?php echo  $news['fon']?>')">
                                <div class="main_news_data"><?php echo  $news['data']?></div>

                                <div class="main_news_name"><?php echo  $news['name']?></div>


                                <div class="main_news_text">
                                    <?php echo  $news['text']?>
                                </div>
                                <div class="main_news_footer">
                                    <div class="main_news_author"><?php echo  $news['author']?></div>
                                    <a class="main_news_link" href="main.php?news_id=<?php echo $news['id']?>">Подробнее...</a>
                                </div>

                            </div>

                       <?php
                                }
                        }

                        show($news);

                        ?>
                    </div>
                </div>

        </section>
        <div class='news_pagination'>
            <? for ($i = 1; $i <= $page; $i++ ): ?>
                <a  href="?page=<? echo $i; ?>"> <? echo $i; ?></a>
            <? endfor; ?>
        </div>


    <? require 'Classes/Footer.php';?>

        <script src='js/jquery-3.4.1.min.js'></script>
        <script src='js/jsAuth/index.js'></script>
</body>
</html>