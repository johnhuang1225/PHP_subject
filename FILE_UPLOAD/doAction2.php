<?php
$fileInfo = $_FILES['myFile'];
$maxSize = 2097152;
$allowExt = array('jpeg', 'jpg', 'png', 'gif', 'wbmp');

if ($fileInfo['error'] == 0) {
  // 檢查文件大小
  if ($fileInfo['size'] > $maxSize) {
    exit('上傳的文件過大');
  }

  // 檢查文件類型
  // $ext = strtolower(end(explode('.', $fileInfo['name'])));
  $ext = pathinfo($fileInfo['name'], PATHINFO_EXTENSION);
  if (!in_array($ext, $allowExt)) {
    exit('非法文件類型');
  }

  // 判斷是否通過HTTP POST上傳的
  if (!is_uploaded_file($fileInfo['tmp_name'])) {
    exit('文件不是透過HTTP POST方式上傳的');
  }

  // 檢查是否是真實的圖片檔案
  $check_image = true;
  if ($check_image) {
    if (!getimagesize($fileInfo['tmp_name'])) {
      exit('不是真正的圖片類型');
    }
  }

  // 檢查通過，上傳文件，確保文件名唯一
  $uniName = md5(uniqid(microtime(true), true)) . '.' . $ext;
  // echo $uniName;exit;
  // 文件目錄不存在則直接建立一個
  $path = 'upload';
  if (!file_exists($path)) {
    mkdir($path, 0777, true);
    chmod($path, 0777);
  }
  if (@move_uploaded_file($fileInfo['tmp_name'], $path . '/' . $uniName)) {
    echo '文件上傳成功';
  } else {
    echo '文件上傳失敗';
  }
} else {
  switch($fileInfo['error']) {
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