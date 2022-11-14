<?php


class  NewData {
    protected $author;
    protected $data;
    protected $text;
    protected $name;
    protected $response;
    protected $img;
    protected $fonImg;
    protected $category;

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

    public function imgUpload ($img, $fonImg) {

        if(!(move_uploaded_file($_FILES['img']['tmp_name'], '../../' . $img))) {
            $this->response =  [
                "status" => false,
                "message" => 'Ошибка загрузки изображения'
            ];

            echo json_encode($this->response);

            die();
        }
        else if

        (!(move_uploaded_file($_FILES['fon_img']['tmp_name'], '../../' . $fonImg))) {
            $this->response =  [
                "status" => false,
                "message" => 'Ошибка загрузки фонового изображения'
            ];

            echo json_encode($this->response);

            die();
        }
    }

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

    public function setCategory ($val) {
        $this->category = $val;
    }

    public function getCategory () {
        return $this->category;
    }
}