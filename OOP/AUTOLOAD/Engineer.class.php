<?php

// include_once('PersonInterface.php');
// include_once('AnimalInterface.php');
include_once('autoload.php');

class Engineer implements PersonInterface, AnimalInterface {
  public function eat() {
    echo 'Engineer eat';
  }
  public function sleep() {
    echo 'Engineer sleep';
  }
  public function running(){
    echo 'Engineer running';
  }
}

$john = new Engineer;
$john->running();
