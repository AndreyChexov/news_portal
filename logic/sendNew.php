<?php
    session_start();
    require_once 'connect.php';

    class NewsData extends Connect {
        protected $author;
        protected $data;
        protected $text;
        protected $name;

        public function setAuthor ($val) {
            $this->author = $val;
        }

        public function getAuthor () {
            return $this->author;
        }

            public function setData ($val) {
                $this->data = $val;
            }

            public function getData () {
                return $this->data;
            }

                public function setText ($val) {
                    $this->text = $val;
                }

                public function getText () {
                    return $this->text;
                }

                        public function setName ($val) {
                            $this->name = $val;
                        }

                        public function getName () {
                            return $this->name;
                        }
    }

;

        class ValidationNews extends NewsData
        {
            protected $errors = [];
            protected $response;

            public function authorVal ($val) {
                if($val === '') {
                    $this->errors[] = 'author';
                }
            }

            public function nameVal ($val) {
                if($val === '') {
                    $this->errors[] = 'name';
                }
            }

            public function dataVal ($val) {
                if(!$val) {
                    $this->errors[] = 'data';
                }
            }

            public function textVal ($val) {
                if(!$val) {
                    $this->errors[] = 'text';
                }
            }

            public function getValResult () {
                if(!empty($this->errors)) {
                    $this->response =  [
                        "status" => false,
                        "type" => 1,
                        "message" => 'Проверьте правильность ввода данных',
                        "fields" => $this->errors
                    ];

                    echo json_encode($this->response);

                    die();

                }
            }


        }


        class  EnterNews extends ValidationNews {
            protected $img;
            protected $fonImg;

            public function setImg ($val) {
                $this->img = $val;
            }

            public function getImg () {
                return $this->img;
            }

                public function setFonImg ($val) {
                    $this->fonImg = $val;
                }

                public function getFonImg () {
                    return $this->fonImg;
                }

            public function imgUpload () {

                if(!(move_uploaded_file($_FILES['img']['tmp_name'], '../' . $this->img))) {
                    $this->response =  [
                        "status" => false,
                        "message" => 'Ошибка загрузки изображения'
                    ];

                    echo json_encode($this->response);

                    die();
                }
                else if

                (!(move_uploaded_file($_FILES['fon_img']['tmp_name'], '../' . $this->fonImg))) {
                    $this->response =  [
                        "status" => false,
                        "message" => 'Ошибка загрузки фонового изображения'
                    ];

                    echo json_encode($this->response);

                    die();
                }
            }

            public function sendNews ($data, $text, $author, $img, $fon, $name) {
                if(empty($this->errors)) {
                    mysqli_query($this->connect, "INSERT INTO `allNews` (`data`, `text`, `author`, `img`, `id`, `fon`, `name`) VALUES ('$data', '$text', '$author', '$img', NULL, '$fon', '$name')");

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

        $sendNews = new EnterNews();

        $sendNews->setDB();
        $sendNews->checkCon();

        $sendNews->setName($_POST['newsName']);
        $sendNews->setAuthor($_POST['author']);
        $sendNews->setData($_POST['data']);
        $sendNews->setText(nl2br($_POST['text']));

        $author = $sendNews->getAuthor();
        $name = $sendNews->getName();
        $data = $sendNews->getData();
        $text = $sendNews->getText();


        $sendNews->authorVal($author);
        $sendNews->nameVal($name);
        $sendNews->textVal($text);
        $sendNews->dataVal($data);
        $sendNews->getValResult();

        $sendNews->setImg('img/' . time() . $_FILES['img']['name']);
        $sendNews->setFonImg('img/' . time() . $_FILES['fon_img']['name']);

        $img = $sendNews->getImg();
        $fon = $sendNews->getFonImg();

        $sendNews->imgUpload();

        $sendNews->sendNews($data,$text,$author,$img,$fon,$name);

