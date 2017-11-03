<?php
namespace App\Util;

class Person {
  const TYPE = 'person';
  public function eat() {
    echo 'Person eat';
  }
  public function sleep() {
    echo 'Person sleep';
  }
}