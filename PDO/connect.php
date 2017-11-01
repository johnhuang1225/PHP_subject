<?php
$tns = "  
  (DESCRIPTION =
    (ADDRESS_LIST =
      (ADDRESS = (PROTOCOL = TCP)(HOST = 172.22.16.85)(PORT = 1521))
    )
    (CONNECT_DATA =
      (SERVER = DEDICATED)
      (SERVICE_NAME = PROD)
    )
  )
  ";
  $db_username = "eflow";
  $db_password = "eflow";

  try {
    $conn = new PDO("oci:dbname=" . $tns, $db_username, $db_password);
  } catch (PDOException $e) {
    echo ($e->getMessage());
  }



?>