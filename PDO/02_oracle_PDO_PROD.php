<?php
//正式機
$tns = '
(DESCRIPTION =
(ADDRESS_LIST =
  (ADDRESS = (PROTOCOL = TCP)(HOST = 172.22.16.85)(PORT = 1521))
)
(CONNECT_DATA =
  (SERVER = DEDICATED)
  (SERVICE_NAME = PROD)
)
)';
$user = 'xxxx';     // 帳號
$passwd = 'xxxx';   // 密碼


try {
    $dbConn = new PDO('oci:dbname=' . $tns . ';charset=UTF8', $user, $passwd);
} catch (PDOException $e){
    echo $e->getMessage();
}

$stmt = $dbConn->query("SELECT * FROM mem_geninf where loginid='a0801'");
$row = $stmt->fetch();

echo '<pre>';
var_dump($row);
echo '</pr>>';