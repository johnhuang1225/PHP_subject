<?php
//本機
$tns = '
  (DESCRIPTION =
    (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521))
    (CONNECT_DATA =
      (SERVER = DEDICATED)
      (SERVICE_NAME = a0801c.chenbro.com.tw)
    )
  )
';
$user = 'agentflow';
$passwd = 'agentflow';

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