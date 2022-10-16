<?php
    require_once 'logic/connect.php';

    $result = mysqli_query($connect, "SELECT * FROM `allNews`");

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
                                    <a href="profile.php"><button class="profile_on"></button></a>
                                    <p class="profile_p"><?php echo $_SESSION['user']['name']?></p>
                                </div>

                <?php
                        } else {
                ?>
                        <a class="auth_btn" href="auth.php"><button>Войти</button></a>
                <?php
                        }

                ?>


            </div>

        </header>

        <section class="news">


                <div class="news_wrapper container">
                    <div class="main_news">
                        <?php
                        while($news = mysqli_fetch_assoc($result)) {

                            ?>


                            <div class="main_news_card">
                                <div class="main_news_data"><?php echo  $news['data'];?></div>

                                <div class="main_news_author"><?php echo  $news['author'];?></div>

                                <div class="main_news_text">
                                    <?php echo  $news['text'];?>
                                </div>
                                <a class="main_news_link" href="main.php">Подробнее...</a>
                            </div>
                            <?php
                        }
                        ?>



        </section>

        <footer>
            <h1>Made by Chexov</h1>
        </footer>

        <script src='js/jquery-3.4.1.min.js'></script>
        <script src='js/jsAuth/index.js'></script>
</body>
</html>