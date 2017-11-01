<?php

/** stored procedure 如下
CREATE OR REPLACE PROCEDURE sp_getMem(
       in_id IN mem_geninf.loginid%TYPE,
       out_memid OUT mem_geninf.memid%TYPE,
       out_name OUT mem_geninf.username%TYPE,
       out_jobtitle OUT mem_geninf.jobtitle%TYPE,
       out_onboard OUT mem_geninf.onboarddate%TYPE)
AS
BEGIN
  SELECT memid, username, jobtitle, onboarddate
  INTO out_memid, out_name, out_jobtitle, out_onboard
  FROM mem_geninf
  WHERE loginid = in_id;
END;
 */


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
    $pdo = new PDO('oci:dbname=' . $tns . ';charset=UTF8', $user, $passwd);
} catch (PDOException $e){
    echo $e->getMessage();
}

$stmt = $pdo->prepare("call sp_getmem(?,?,?,?,?)");
// var_dump($stmt);
$loginid = 'a0801';
$stmt->bindParam(1, $loginid, PDO::PARAM_STR, 12);
$stmt->bindParam(2, $memid, PDO::PARAM_STR, 20);
$stmt->bindParam(3, $name, PDO::PARAM_STR, 20);
$stmt->bindParam(4, $jobtitle, PDO::PARAM_STR, 20);
$stmt->bindParam(5, $onboard, PDO::PARAM_STR, 20);

$stmt->execute();

echo "memid: {$memid}, name: {$name}, jobtitle: {$jobtitle}, onboard: {$onboard}";



