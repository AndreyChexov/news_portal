<?php
    session_start();
    if($_SESSION['user']) {
        header('Location: profile.php');
    }
?>

    <form class='reg_form'>

            <h1 class='auth_title'>Регистрация</h1>
            
            <input type="text" class='reg_input' placeholder='Ваш логин' name='login'>
            
            <input type="password" class='reg_input' placeholder='Ваш пароль' name='password'>

            <input type="password" class='reg_input' placeholder='Подтвердите Ваш пароль' name='confirm'>
            
            <input type="text" class='reg_input' placeholder='Ваше имя' name='name'>

            <button type='submit' class='reg_btn'>Зарегистрироваться</button>

            <p>У вас уже есть аккаунт? - <a href="/news/index.php?path=auth">Войти</a></p>

            <a href="/news/index.php?path=news">Вернуться к новостям...</a>

            <p class='msg none'></p>
             
    </form>
