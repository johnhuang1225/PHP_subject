<?php

$table = "mem_geninf";
$array = array(
  'username' => 'john',
  'password' => '12345',
  'age' => '20',
  'email' => 'johnh@gmail.com',
);

function generator_insert($table, $array) {
  $key_str = join(',', array_keys($array));
  $value_str = "'".join("','", array_values($array))."'";
  $sql = "INSERT INTO {$table} ({$key_str}) VALUES({$value_str})";
  return $sql;
}

$sql = generator_insert($table, $array);
var_dump($sql);
