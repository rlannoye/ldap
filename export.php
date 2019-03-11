<?php
	include 'connexion.php';
	
	
	if(isset($_POST['export_json'])){
	$allusers = ldap_search($ldapconn, "dc=bla, dc=com", "uid=*");
	$allgroups = ldap_search($ldapconn, "ou=group,dc=bla,dc=com","cn=*");
	$listu = ldap_get_entries($ldapconn, $allusers);
	$listg = ldap_get_entries($ldapconn, $allgroups);
	header('Content-Type: application/json');
	echo json_encode($listu);
	exit();
	}
	ldap_close($ldapconn);
	include 'ldap.html';
?>
