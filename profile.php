<?php
    session_start();
    if(!$_SESSION['user']) {
        header('Location: index.php');
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='style/styleAuth.scss' rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title><?php echo $_SESSION['user']['name'];?></title>
</head>
<body> 
    <form class='auth_form profile'>
        <h1 class="profile_name">Hello, <?php echo $_SESSION['user']['name']; ?></h1>
        <a class="create_new" href="creation_news.php">Создать статью</a>
        <a href="index.php" style="margin-bottom: 10px;">Вернуться к новостям...</a>
        <a href="logic/out.php">Выход</a>
    </form>


</body>
</html>