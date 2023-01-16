<?php
   
    if(!$_SESSION['user']) {
        header('Location: /portal?path=news');
    }
    
?>

    <form class='auth_form profile'>
        <h1 class="profile_name">Hello, <?php echo $_SESSION['user']['name']; ?></h1>
        <a class="create_new" href="/portal?path=creationNews">Создать статью</a>
        <a href="/portal?path=news" style="margin-bottom: 10px;">Вернуться к новостям...</a>
        <a href="/portal?path=logOut">Выход</a>
    </form>
