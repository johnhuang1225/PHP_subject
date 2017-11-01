<?php
try {
    $sql = <<<EOF
        CREATE TABLE IF NOT EXISTS user(
            id INT UNSIGNED AUTO_INCREMENT KEY,
            username VARCHAR(20) NOT NULL UNIQUE,
            password VARCHAR(32) NOT NULL,
            email VARCHAR(30) NOT NULL
        )
EOF;
    $pdo = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    // exec():執行一條SQL語句並返回其受影響的列數，若沒有受影響的記錄則返回0
    // exec()對於select沒有作用
    $result = $pdo->exec($sql);
//    var_dump($result);

    // 插入數據
    $u = "johnhuang";
    $p = md5('john');
    $email = "johnhuang@gmail.com";
    $insert_sql = "INSERT INTO user(username, password, email) VALUES('{$u}', '{$p}', '{$email}')";
    $result = $pdo->exec($insert_sql);
    echo "受影響記錄的條數: " . $result , '<br>';
    echo "插入數據的ID: " . $pdo->lastInsertId() , '<br>';
} catch (PDOException $e) {
    echo $e->getMessage();
}