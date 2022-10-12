<?php
    session_start();
    if($_SESSION['user']) {
        header('Location: profile.php');
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='style/styleAuth.scss' rel="stylesheet" type="text/css">
    <title>Регистрация</title>
</head>
<body> 
    <form class='reg_form'>

            <h1 class='auth_title'>Регистрация</h1>
            
            <input type="text" class='reg_input' placeholder='Ваш логин' name='login'>
            
            <input type="password" class='reg_input' placeholder='Ваш пароль' name='password'>
            
            <input type="text" class='reg_input' placeholder='Ваше имя' name='name'>

            <button type='submit' class='reg_btn'>Зарегистрироваться</button>

            <p>У вас уже есть аккаунт? - <a href="auth.php">Войти</a></p>

        <a href="index.php">Вернуться к новостям...</a>

            <p class='msg none'></p>
             
    </form>

    <script src='js/jquery-3.4.1.min.js'></script>
    <script src='js/jsAuth/index.js'></script>
</body>
</html>