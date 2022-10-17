<?php
    session_start();
    require_once 'connect.php';


    $author = $_POST['author'];
    $data = $_POST['data'];
    $text = nl2br($_POST['text']);
    $name = $_POST['newsName'];

    $errors = [];

    if($author === '') {
        $errors[] = 'author';
    }

     if($name === '') {
         $errors[] = 'name';
     }

    if(!$text) {
        $errors[] = 'text';
    }

    if(!$data) {
        $errors[] = 'data';
    }

    if(!empty($errors)) {
        $response =  [
            "status" => false,
            "type" => 1,
            "message" => 'Проверьте правильность ввода данных',
            "fields" => $errors
        ];

        echo json_encode($response);

        die();

    }


    if(empty($errors)) {

        $img = 'img/' . time() . $_FILES['img']['name'];
        $fon_img = 'img/' . time() . $_FILES['fon_img']['name'];


            if(!(move_uploaded_file($_FILES['img']['tmp_name'], '../' . $img))) {
                $response =  [
                    "status" => false,
                    "message" => 'Ошибка загрузки изображения'
                ];

                echo json_encode($response);

                die();
            }

            if(!move_uploaded_file($_FILES['fon_img']['tmp_name'], '../' . $fon_img) ){
                $response =  [
                    "status" => false,
                    "message" => 'Ошибка загрузки фонового изображения'
                ];

                echo json_encode($response);

                die();

            }

        mysqli_query($connect, "INSERT INTO `allNews` (`data`, `text`, `author`, `img`, `id`, `fon`, `name`) VALUES ('$data', '$text', '$author', '$img', NULL, '$fon_img', '$name')");

        $response =  [
            "status" => true,
            "message" => 'Статья успешно создана',
        ];

        echo json_encode($response);

    } else {

        $response =  [
            "status" => false,
            "message" => 'Укажите имя автора',
        ];

        echo json_encode($response);

    }