<?php
$fileInfo = $_FILES['myFile'];
$filename = $fileInfo['name'];
$type = $fileInfo['type'];
$tmp_name = $fileInfo['tmp_name'];
$size = $fileInfo['size'];
$error = $fileInfo['error'];

if ($error == UPLOAD_ERR_OK) {
  $dir = dirname(__FILE__);
  $destination_dir = $dir . '/upload/';
  if (move_uploaded_file($tmp_name, $destination_dir . $filename)) {
    echo $filename.' 文件上傳成功';
  } else {
    echo '上傳失敗';
  }
} else {
  switch($error) {
    case 1:
      echo "上傳的文件超過了 php.ini 中 upload_max_filesize 選項限制的值";
      break;
    case 2:
      echo "上傳的文件超過了 HTML 表單中 MAX_FILE_SIZE 選項指定的值";
      break;
    case 3:
      echo "文件只有部分被上傳";
      break;
    case 4:
      echo "沒有文件被上傳";
      break;
    case 6:
      echo "找不到臨時文件夾";
      break;
    case 7:
      echo "文件寫入失敗";
      break;
    case 8:
      echo "上傳的文件被 PHP 擴展程序中斷";
      break;
  }
}