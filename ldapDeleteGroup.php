<?php
	include 'connexion.php';
	include 'ldap.html';
	$cn=$_POST['groupsup'];
	
	
	$dn="cn=".$cn.",ou=group,dc=bla,dc=com";
	
	$r=ldap_delete($ldapconn, $dn);
 
	echo "La suppression a réussi !!!\n";
	
	if(isset($_POST['delallgroup'])){
		$todelgroup = ldap_search($ldapconn, "ou=group,dc=bla,dc=com", "cn=*");
		$listg = ldap_get_entries($ldapconn, $todelgroup);
		for ($i = 0; $i < $listg["count"]; $i++) {
			ldap_delete($ldapconn, $listg[$i]["dn"]);
		}
	}
	
	ldap_close($ldapconn);
?>
