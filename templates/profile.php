<?php
   
    if(!$_SESSION['user']) {
        header('Location: index.php');
    }
    
?>

    <form class='auth_form profile'>
        <h1 class="profile_name">Hello, <?php echo $_SESSION['user']['name']; ?></h1>
        <a class="create_new" href="/news/index.php?path=creationNews">Создать статью</a>
        <a href="/news/index.php?path=news" style="margin-bottom: 10px;">Вернуться к новостям...</a>
        <a href="/news/index.php?path=logOut">Выход</a>
    </form>
