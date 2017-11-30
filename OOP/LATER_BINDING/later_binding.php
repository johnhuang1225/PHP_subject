<?php
    class Father {
        public function play() {
            echo '老爸 playing';
        }
        public function do() {
            $this->play();
        }
    }
    class Son extends Father {
        public function play() {
            echo '兒子 playing';
        }
    }

    $son = new Son;
    $son->do();
?>