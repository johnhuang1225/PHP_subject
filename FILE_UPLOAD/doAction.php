<?php
// print_r($_FILES);
$filename = $_FILES['myFile']['name'];
$type = $_FILES['myFile']['type'];
$tmp_name = $_FILES['myFile']['tmp_name'];
$size = $_FILES['myFile']['size'];
$error = $_FILES['myFile']['error'];

$upload_folder =  dirname(__FILE__) . '/upload';
// if (move_uploaded_file($tmp_name, $upload_folder . "/" . $filename)) {
//   echo '上傳成功';
// } else {
//   echo '上傳失敗';
// }

// if (copy($tmp_name, $upload_folder . "/" .$filename)) {
//   echo '拷貝成功';
// } else {
//   echo '拷貝失敗';
// }


