<?php

$fileInfo = array(
    'name' => 'c:\aaa\bbb\ccc\test.php'
);

$tmp = explode('.', $fileInfo['name']);
$ext = strtolower(end($tmp));
echo $ext.'<br>';
$ext = pathinfo($fileInfo['name'], PATHINFO_EXTENSION);
echo $ext;