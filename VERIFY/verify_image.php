<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

<h2>PHP 亂數產生驗證碼圖片</h2>
<img id="verify_img" src="verify.php" alt="">
<a href="javascript:void(0);" onclick="changeImage();">重新產生</a>


<script>
    function changeImage() {
        $('#verify_img').attr('src', 'verify.php?id=' + new Date().getTime());
    }
</script>
</body>
</html>