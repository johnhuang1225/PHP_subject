<?php
header("content-type:text/html;charset=utf-8");

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

$conn = oci_connect('eflow', 'eflow', '172.22.16.85/PROD');
if (!$conn) {
    echo 'connection error';
} else {
    echo 'connection ok';
}
