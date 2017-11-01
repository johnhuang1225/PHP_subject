<?php
$ldaphost = "tpad1.chenbro.com.tw";
$ldapport = 389;
$ldapconn = ldap_connect($ldaphost, $ldapport) or die('無法連接至LDAP');
var_dump($ldapconn);


?>