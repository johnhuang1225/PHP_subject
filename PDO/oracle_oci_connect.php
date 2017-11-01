<?php
// header("content-type:text/html;charset=utf-8");
$conn = oci_connect('agentflow', 'agentflow', 'localhost/a0801c.chenbro.com.tw', 'UTF8') or die('連接資料庫錯誤:' . oci_error);

$result = oci_parse($conn, "select * from mem_geninf");
oci_execute($result);

while ($row = oci_fetch_array($result)) {
    echo $row['USERNAME'] . '  ' . $row['EMAIL'] . '<br>';
}