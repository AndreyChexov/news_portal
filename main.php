<?php
    require 'Classes/Connection/Connect.php';
    require 'Classes/ShowNews/GetNewsFromDB.php';


    ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styleAuth.scss">
    <link rel="stylesheet" href="style/style.scss">
<!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">-->
    <title>Main</title>
</head>
<body>
    <? require 'Classes/Header.php';?>
        <?php
            class ShowOneNew extends GetNewsFromDB {
            private $getId;

            public function setId () {
                $this->getId = $_GET['news_id'];
            }

            public function getId ()
            {
                return $this->getId;
        }

            function showNew ($id, $val) {

                    while($this->news = mysqli_fetch_assoc($val)) {

                        if($id == $this->news['id']) {
        ?>
                    <div class="news_page container">
                        <div class="news_page_name" style="background-image: url('<?php echo $this->news['fon']?>')"><?php echo $this->news['name']?></div>
                        <div class="news_page_text"><?php echo $this->news['text']?></div>
                        <div class="news_page_footer">
                            <div>Автор: <?php echo $this->news['author']?></div>
                            <div><?php echo $this->news['data']?></div>
                        </div>


                        <form class="comments comment_form">
                            <label for="" style="margin-bottom: 40px; font-size: 20px">Комментарии:</label>
                            <textarea class="text_comment" type="text" name="comment"></textarea>
                            <input name="page" type="hidden" value="<? echo $_GET['news_id']; ?>">
                            <button class="comment_btn" type="submit">Оставить комментарий</button>

                        </form>


                    </div>

    <?php

            }
        }
        }

            public function showComments ($val) {

                while ($comments = mysqli_fetch_assoc($val))
                    if($comments['page'] === $_GET['news_id']) {

                        ?>
                        <div class="list_comments">
                            <div class="list_comments_wrapper">
                            <div class="text_comment"><?echo $comments['text']?></div>
                            <div class="wrapper_for_details">
                                <div class="time_comment"><? echo $comments['time']?></div>
                                <div class="author_comment">Автор: <? echo  $comments['author']?></div>
                                <a class="comments_answer_btn" href="#">Ответить</a>

                            </div>

                            </div>

                            <form class="comments_answer none_answer">
                                <textarea name="comment_answer" id="" cols="50" rows="2" class="for_answer"></textarea>
                                <button type="submit">Отправить</button>
                            </form>

                                    <div class="wrapper_for_details none_answer">
                                        <div class="time_comment"><? echo $comments['time']?></div>
                                        <div class="author_comment">Автор: <? echo  $comments['author']?></div>
                                        <a class="comments_answer_btn" href="#">Ответить</a>
                                    </div>
                        </div>
                        <?php

            }}}

        Connect::getInstance()->setDB();
        Connect::getInstance()->checkCon();
        $connect = Connect::getInstance()->connect;

        $showSingle = new ShowOneNew();
        $showSingle->setRes($connect);
        $showSingle->setComments($connect);
        $showSingle->setId();
        $id = $showSingle->getId();

        $getFormDB = $showSingle->getRes();
        $getComments = $showSingle->getComments();
        $showSingle->showNew($id, $getFormDB);
        $showSingle->showComments($getComments);
    ?>
    <a class="news_page_link" href="index.php">Вернуться к списку новостей...</a>
    <? require 'Classes/Footer.php'?>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src='js/jsAuth/index.js'></script>
</body>
</html>