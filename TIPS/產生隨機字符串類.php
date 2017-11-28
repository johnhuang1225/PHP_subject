<?php
header('content-type:text/html;charset=utf-8');

class RandomString {
  private $length;
  private $type;
  public function __construct($type=1, $length=4) {
    $this->length = $length;
    $this->type = $type;
  }
  public function getRandomString() {
    switch($this->type) {
      case 1:
        return join(array_rand(range(0, 9), $this->length));
        break;
      case 2:
        return join(array_rand(array_flip(array_merge(range('a','z'), range('A','Z'))), $this->length));
        break;
      case 3:
      return join(array_rand(array_flip(array_merge(range(0,9),range('a','z'), range('A','Z'))), $this->length));
      break;
    }
  }

}


$obj = new RandomString(3);
echo $obj->getRandomString();