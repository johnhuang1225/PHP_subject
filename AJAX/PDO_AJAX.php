<?php
header('content-type:text/html;charset=utf-8');
$id = $_POST['id'];
try {
  $pdo = new PDO("mysql:host=localhost;dbname=laravel_udemy;charset=utf8", "root", "");
  $pdo->query("set name utf-8");
  $sql = "select category_name from blog_category where category_id=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(array($id));
  $data = $stmt->fetch(PDO::FETCH_ASSOC);
  $name = $data['category_name'];
} catch(PDOException $e) {
  echo $e->getMessage();
}

if ($stmt->rowCount() == 1) {
  $response = [
    'errno' => '0',
    'msg' => 'success',
    'name' => $name,
  ];
} else {
  $response = [
    'errno' => '1',
    'msg' => 'fail',
    'name' => '',
  ];
}

echo json_encode($response);