<?php
try {
    $dsn = "mysql:host=localhost;dbname=test;charset=utf8";
    $username = "root";
    $password = "";
    $pdo = new PDO($dsn, $username, $password);
    var_dump($pdo);
} catch (PDOException $e) {
    echo $e->getMessage();
}