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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Main</title>
</head>
<body>
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

            public function showNew ($id, $val) {

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
                        <a class="news_page_link" href="index.php">Вернуться к списку новостей...</a>
                    </div>

<?php

            }
        }
        }

        }

        $newConnect = new Connect();
        $newConnect->setDB();
        $newConnect->checkCon();
        $connect = $newConnect->connect;

        $showSingle = new ShowOneNew();
        $showSingle->setRes($connect);
        $showSingle->setId();
        $id = $showSingle->getId();
        $getFormDB = $showSingle->getRes();
        $showSingle->showNew($id, $getFormDB);
        ?>



</body>
</html>