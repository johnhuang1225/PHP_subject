<?php
//ini_set('display_errors', 1); //顯示錯誤訊息
//ini_set('log_errors', 1); //錯誤log 檔開啟
//ini_set('error_log', dirname(__FILE__) . '/error_log.txt'); //log檔位置
//error_reporting(E_ALL); //錯誤回報

header("Content-type: image/png");  //檔頭改為PNG

session_start();                    //啟用Session
define('CAPTCHA_WIDTH', 100);       //圖片寬度
define('CAPTCHA_HEIGHT', 25);       //圖片高度

$password_len = 5;
$password = '';
// remove o,0,1,l
$word = 'ABCDEFGHIJKLMNPRSTUVWXYZ';
$len = strlen($word);
for ($f = 0; $f < $password_len; $f++){
    $password .= $word[rand() % $len];
};

$pass_phrase = $password;               //驗證碼，可套用亂數密碼產生器
$_SESSION['pass'] = $pass_phrase;   //把驗證碼丟到Session

$img = imagecreatetruecolor(CAPTCHA_WIDTH, CAPTCHA_HEIGHT); //產生圖片
$bg_color = imagecolorallocate($img, 255, 255, 255);        //背景-白色
$text_color = imagecolorallocate($img, 0, 0, 0);            //文字-黑色
$graphic_color = imagecolorallocate($img, 0, 0, 255);       //雜訊-藍色
//填充背景
imagefilledrectangle(
    $img,
    0,
    0,
    CAPTCHA_WIDTH,
    CAPTCHA_HEIGHT,
    $bg_color
);
//繪入文字雜訊-線條
for ($i = 0; $i < 2; $i++) { //2條
    imageline(
        $img,
        0,
        rand() % CAPTCHA_HEIGHT,
        CAPTCHA_WIDTH,
        rand() % CAPTCHA_HEIGHT,
        $graphic_color
    );
}
//繪入文字雜訊-點
for ($i = 0; $i < 50; $i++) {    //50點
    imagesetpixel(
        $img,
        rand() % CAPTCHA_WIDTH,
        rand() % CAPTCHA_HEIGHT,
        $graphic_color
    );
}
//繪入文字
imagettftext(
    $img,
    13,
    5,
    15,
    CAPTCHA_HEIGHT - 5,
    $text_color,
    'back-to_bay.ttf',    //字型檔
    $pass_phrase
);
imagepng($img);
imagedestroy($img);
?>