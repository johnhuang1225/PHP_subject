<?php
// http://ithelp.ithome.com.tw/questions/10167400
/**
 * Created by Joe of ExchangeCore.com
 * https://www.exchangecore.com/blog/how-use-ldap-active-directory-authentication-php/
 */
if(isset($_POST['username']) && isset($_POST['password'])){

    $adServer = "ldap://tpad1.chenbro.com.tw";
	
    $ldap = ldap_connect($adServer);
    $username = $_POST['username'];
    $password = $_POST['password'];

    $ldaprdn = 'chenbrotp' . "\\" . $username;
    
    ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

    $bind = @ldap_bind($ldap, $ldaprdn, $password);


    if ($bind) {
        $filter="(sAMAccountName=$username)";
        $result = ldap_search($ldap,"ou=mail,dc=chenbro,dc=com,dc=tw",$filter);
        ldap_sort($ldap,$result,"sn");
        $info = ldap_get_entries($ldap, $result);
        for ($i=0; $i<$info["count"]; $i++)
        {
            if($info['count'] > 1)
                break;
            // echo "<p>You are accessing <strong> ". $info[$i]["sn"][0] .", " . $info[$i]["givenname"][0] ."</strong><br /> (" . $info[$i]["samaccountname"][0] .")</p>\n";
            echo "<p>You are accessing <strong> ". $info[$i]["givenname"][0] ."</strong><br /> (" . $info[$i]["samaccountname"][0] .")</p>\n";
            echo '<pre>';
            var_dump($info);
            echo '</pre>';
            $userDn = $info[$i]["distinguishedname"][0]; 
        }
        @ldap_close($ldap);
    } else {
        $msg = "Invalid email address / password";
        echo $msg;
    }

}else{
?>
    <form action="#" method="POST">
        <label for="username">Username: </label><input id="username" type="text" name="username" /> 
        <label for="password">Password: </label><input id="password" type="password" name="password" />        <input type="submit" name="submit" value="Submit" />
    </form>
<?php } ?> 