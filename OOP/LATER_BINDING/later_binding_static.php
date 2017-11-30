<?php
    class Person {
        public static function play() {
            echo 'Person playing.....';
        }
        public static function do() {
            static::play(); // 後期靜態綁定
        }
    }
    class Son extends Person {
        public static function play() {
            echo 'Son playing.....';
        }
    }
    Son::do();
?>