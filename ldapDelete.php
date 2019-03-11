<?php
	include 'connexion.php';
	include 'ldap.html';
	$uid=$_POST['pseudosup'];
	
	
	$dn="uid=$uid,ou=people,dc=bla,dc=com";
	
	$r=ldap_delete($ldapconn, $dn);
 
	echo "La suppression a réussi !!!\n";
	
	if(isset($_POST['delall'])){
		$todeluser = ldap_search($ldapconn, "ou=people,dc=bla,dc=com", "uid=*");
		$listu = ldap_get_entries($ldapconn, $todeluser);
		for ($i = 0; $i < $listu["count"]; $i++) {
			ldap_delete($ldapconn, $listu[$i]["dn"]);
		}
	}
	
	ldap_close($ldapconn);
?>
