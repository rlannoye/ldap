<?php
	include 'connexion.php';
	include 'ldapUser.html';
	
    $uid = $_POST['login'];
	$dn="uid=$uid,ou=people,dc=bla,dc=com";
	$info["userPassword"] = $_POST['newPassword'];
	$result=ldap_modify($ldapconn,"uid=".$uid.",ou=people,dc=bla,dc=com",$info);
    
    echo "<br />Modification de mot de passe effectué !!!\n";
    
    ldap_close($ldapconn);
?>
