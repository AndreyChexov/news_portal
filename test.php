<?php

    class StaticProps {
        public static $prop = 'hello';
        public $coll = 'coll';

    }

    $obj = new StaticProps();

    $obj::$prop = 'new hello';

    echo $obj::$prop;
    echo '<br>';

    StaticProps::$prop = 'new HEllo';

    echo StaticProps::$prop;