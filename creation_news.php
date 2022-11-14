<?php
    session_start();
    if(!$_SESSION['user']) {
        header('Location: auth.php');
    }

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">-->

    <link rel="stylesheet" href="style/styleAuth.scss">
    <link rel="stylesheet" href="style/style.scss">
    <title>Новая статья</title>
</head>
<body>
    <? require 'Classes/Header.php'?>


    <form class="auth_form creation_form" enctype="multipart/form-data" style="margin-top: 50px;">

        <h1>Новая статья</h1>
        <label for="" style="margin-bottom: 5px;">Название статьи</label>
        <input type="text" class="name" name="newsName" style="margin-bottom: 15px;">
        <label for="" style="margin-bottom: 5px;">Имя автора</label>
        <input type="text" class="author" name="author" style="margin-bottom: 15px;">
        <label for="" style="margin-bottom: 5px;">Дата создания статьи</label>
        <input type="date" style="margin-bottom: 15px;" name="data">
        <label for="" style="margin-bottom: 5px;">Фоновое изображение карточки</label>
        <input type="file" style="margin-bottom: 15px;" name="fon_img">
        <label for="" style="margin-bottom: 5px;">Изображение для статьи</label>
        <input type="file" style="margin-bottom: 15px;" name="img">
        <label for="" style="margin-bottom: 5px;">Выберите категорию для статьи</label>
        <select type="text" style="margin-bottom: 15px;" name="category">
            <option>animals</option>
            <option>cities</option>
        </select>
        <label for="" style="margin-bottom: 5px;">Текст статьи</label>
        <textarea cols="5" rows="5"  style="margin-bottom: 15px;" name="text"></textarea>

        <button class="send_btn" type="submit" style="margin-bottom: 15px; border-radius: 10px;">Создать статью</button>

        <p class='msg none'></p>
        <a href="profile.php" style="margin-bottom: 15px;">Вернуться в профиль</a>
        <a href="index.php" style="margin-bottom: 15px;">Вернуться к новостям</a>


</form>

    <? require 'Classes/Footer.php'?>
    <script src='js/jquery-3.4.1.min.js'></script>
    <script src='js/jsAuth/index.js'></script>
</body>
</html>