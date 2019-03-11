<?php
	include 'connexion.php';
	include 'ldap.html';

	$groupmod = $_POST['groupmod'];
	$dn="cn=".$groupmod.",ou=group,dc=bla,dc=com";
	$info["description"] = $_POST['newDescription'];
	ldap_rename($ldapconn,$dn,"cn=".$_POST['newGroup'],null,TRUE);
	$result=ldap_modify($ldapconn,"cn=".$_POST['newGroup'].",ou=group,dc=bla,dc=com",$info);
    
    echo "La modification a été effectué !!!\n";
    ldap_close($ldapconn);
    
?>
