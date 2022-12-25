<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="assets/style/style.scss" rel="stylesheet" type="text/css">
    <link href="assets/style/styleAuth.scss" rel="stylesheet" type="text/css">
    <title><? echo $title?></title>
</head>
<body>
        <?php
        require_once 'Header.php';
       
        require_once $content;

         require_once 'Footer.php';
         
        ?>

<script src='assets/js/jquery-3.4.1.min.js'></script>
<script src='assets/js/jsAuth/index.js'></script>
</body>
</html>