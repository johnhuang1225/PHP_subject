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

function generator_update($table, $array, $where=null) {
  // $set = "";
  foreach ($array as $key => $val) {
    $set .= "{$key} = '{$val}',";
  }
  $set = trim($set, ',');
  $where = $where ? 'WHERE '.$where : '';
  // $where = $where==null ? '' : ' WHERE '.$where;
  return $sql = "UPDATE {$table} set {$set} {$where}";
}

$insert_sql = generator_insert($table, $array);
var_dump($insert_sql);
$update_sql = generator_update($table, $array, "id='2'");
var_dump($update_sql);