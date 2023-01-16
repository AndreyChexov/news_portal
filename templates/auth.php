<?php


    if($_SESSION['user']) {
        header('Location: /portal?path=profile');
    }
?>

    <form class='auth_form'>
        
            <h1 class='auth_title'>Авторизация</h1>
            
            <input type="text" class='auth_input auth_login' placeholder='Логин' name='login'>
            
            <input type="password" class='auth_input auth_password' placeholder='Пароль' name='password'>

            <button type='submit' class='auth_btn'>Войти</button>

            <p>У вас нет аккаунта? - <a href="/portal?path=registration">Зарегистрироваться</a></p>

                 <a href="/portal?path=news">Вернуться к новостям...</a>

             <p class='msg none'></p>
    </form>
