<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    $sql = "select * from user";

    $stmt = $pdo->query($sql);
//    var_dump($stmt);
    if ($stmt) {
        foreach ($stmt as $row) {
            print_r($row);
            echo '<hr>';
        }
    }

} catch (PDOException $e) {
    echo $e->getMessage();
}
