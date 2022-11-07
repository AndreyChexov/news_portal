<?php
    session_start();
    require 'NewData.php';
    require 'ValidationNewData.php';
    require '../Connection/Connect.php';

class SendNew

{
    protected $response;
    protected $errors;

    public function sendNews ($data, $text, $author, $img, $fon, $name, $connect) {
        if(empty($this->errors)) {
            mysqli_query($connect, "INSERT INTO `allNews` (`data`, `text`, `author`, `img`, `id`, `fon`, `name`) VALUES ('$data', '$text', '$author', '$img', NULL, '$fon', '$name')");

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
    $newConnect = new Connect();
    $newData = new NewData();
    $valid = new ValidationNewData();
    $sendNew = new SendNew();

    $newConnect->setDB();
    $newConnect->checkCon();
    $connect = $newConnect->connect;

    $newData->setData($_POST['data']);
    $newData->setText(nl2br($_POST['text']));
    $newData->setName($_POST['newsName']);
    $newData->setAuthor($_POST['author']);
    $newData->setImg('img/' . time() . $_FILES['img']['name']);
    $newData->setFonImg('img/' . time() . $_FILES['fon_img']['name']);

    $data = $newData->getData();
    $text = $newData->getText();
    $name = $newData->getName();
    $author = $newData->getAuthor();
    $img = $newData->getImg();
    $fonImg = $newData->getFonImg();

    $newData->imgUpload($img, $fonImg);

    $valid->dataVal($data);
    $valid->textVal($text);
    $valid->nameVal($name);
    $valid->authorVal($author);
    $valid->getValResult();

    $sendNew->sendNews($data,$text,$author,$img,$fonImg,$name,$connect);


