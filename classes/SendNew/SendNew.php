<?php

    require '../../controllers/NewsController/NewData.php';
    require '../../controllers/NewsController/ValidationNewData.php';
    require '../Connection/Connect.php';

class SendNew

{
    protected $response;

    public function sendNews ($data, $text, $author, $img, $fon, $name, $connect, $categoryId) {

        if(mysqli_query($connect, "INSERT INTO `allNews` (`data`, `text`, `author`, `img`, `id`, `fon`, `new_name`, `category`) VALUES ('$data', '$text', '$author', '$img', NULL, '$fon', '$name', '$categoryId')")) {

              $this->response =  [
                "status" => true,
                "message" => 'Статья успешно создана',
            ];

            echo json_encode($this->response);
        }
        else {
            $this->response =  [
                "status" => false,
                "message" => 'Заполните все поля',
            ];

            echo json_encode($this->response);
        }
    }


}
    $newData = new NewData();
    $valid = new ValidationNewData();
    $sendNew = new SendNew();


    $newData->setData($_POST['data']);
    $newData->setText(nl2br($_POST['text']));
    $newData->setName($_POST['newsName']);
    $newData->setAuthor($_POST['author']);
    $newData->setImg('assets/img/' . time() . $_FILES['img']['name']);
    $newData->setFonImg('assets/img/' . time() . $_FILES['fon_img']['name']);
    $newData->setCategory($_POST['category']);


    $data = $newData->getData();
    $text = $newData->getText();
    $name = $newData->getName();
    $author = $newData->getAuthor();
    $img = $newData->getImg();
    $fonImg = $newData->getFonImg();
    $categoryId = $newData->getCategory();
//    if($category === 'Животные') {
//        $categoryId = 1;
//    } elseif ($category === 'Города') {
//        $categoryId = 2;
//    } elseif ($category === 'Автомобили') {
//        $categoryId = 5;
//    } elseif ($category === 'Прочее') {
//        $categoryId = 6;
//    }


    $newData->imgUpload($img, $fonImg);

    $valid->dataVal($data);
    $valid->textVal($text);
    $valid->nameVal($name);
    $valid->authorVal($author);
    $valid->getValResult();

   $sendNew->sendNews($data,$text,$author,$img,$fonImg,$name,Connect::getInstance()->getConnect(), $categoryId);



