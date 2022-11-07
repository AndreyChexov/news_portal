<?php

    require_once 'Classes/Connection/Connect.php';

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
        <header>
            <div class='header_wrapper container'>
                    <div class="label">News portal</div>

                <?php
                        session_start();

                        if($_SESSION['user']) {
                 ?>
                                <div class="profile_div">
                                    <a href="profile.php">
                                        <img class="profile_on" src="icons/free-icon-user-1550584.png" alt="">
                                    </a>
                                    <p class="profile_p"><?php echo $_SESSION['user']['name']?></p>
                                </div>

                <?php
                        } else {
                ?>
                        <a class="enter_btn" href="auth.php"><button>Войти</button></a>
                <?php
                        }

                ?>


            </div>

        </header>

        <section class="news">


                <div class="news_wrapper container">
                    <div class="main_news">
                        <?php


                        class ShowNews extends Connect {
                            public $result;
                            public $news;

                            public function setRes () {
                                $this->result = mysqli_query($this->connect, "SELECT * FROM `allNews`");
                            }

                            public function getRes () {
                                return $this->result;
                            }


                            public function show ($val) {
                                while( $this->news = mysqli_fetch_assoc($val)) {

                            ?>


                            <div class="main_news_card" style="background-image: url('<?php echo  $this->news['fon'];?>')">
                                <div class="main_news_data"><?php echo  $this->news['data'];?></div>

                                <div class="main_news_name"><?php echo  $this->news['name'];?></div>


                                <div class="main_news_text">
                                    <?php echo  $this->news['text'];?>
                                </div>
                                <div class="main_news_footer">
                                    <div class="main_news_author"><?php echo  $this->news['author'];?></div>
                                    <a class="main_news_link" href="main.php?news_id=<?php echo $this->news['id'];?>">Подробнее...</a>
                                </div>

                            </div>
                            <?php
                        }
                        }
                        }

                        $new = new ShowNews();
                        $new->setDB();
                        $new->checkCon();
                        $new->setRes();
                        $getFromDB = $new->getRes();

                        $new->show($getFromDB);
                        ?>
                    </div>
                </div>


        </section>

        <footer>
            <h1>Made by Chexov</h1>
        </footer>

        <script src='js/jquery-3.4.1.min.js'></script>
        <script src='js/jsAuth/index.js'></script>
</body>
</html>