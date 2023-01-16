<?php
    
    if(!$_SESSION['user']) {
        header('Location: /portal?path=news');
    }

?>

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
        <select style="margin-bottom: 15px;" name="category">
            <option>Животные</option>
            <option>Города</option>
            <option>Автомобили</option>
            <option>Прочее</option>
        </select>
        <label for="" style="margin-bottom: 5px;">Текст статьи</label>
        <textarea cols="5" rows="5"  style="margin-bottom: 15px;" name="text"></textarea>

        <button class="send_btn send_cat" type="submit" style="margin-bottom: 15px; border-radius: 10px;">Создать статью</button>

        <p class='msg none'></p>
        <a href="/portal?path=profile" style="margin-bottom: 15px;">Вернуться в профиль</a>
        <a href="/portal?path=news" style="margin-bottom: 15px;">Вернуться к новостям</a>


</form>
