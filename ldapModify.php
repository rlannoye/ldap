<?php
	include 'connexion.php';
	include 'ldap.html';
	
	$uid=$_POST['pseudomod'];
	$dn="uid=$uid,ou=people,dc=bla,dc=com";
	$info["cn"] = $_POST['newNom'];
    $info["sn"] = $_POST['newPrenom'];
    $info["givenName"] = $_POST['newNom'] . " " . $_POST['newPrenom'];
    $info["userPassword"] = $_POST['newPassword'];
	$result=ldap_modify($ldapconn,"uid=".$uid.",ou=people,dc=bla,dc=com",$info);
    
    echo "<br />Modification effectué !!!\n";
    
    ldap_close($ldapconn);
	
	
	
	/*
	$uid=$_POST['pseudomod'];


	$dn="uid=$uid,ou=people,dc=bla,dc=com";
	
	$r=ldap_delete($ldapconn, $dn);
 
	$dn="uid=$uid,ou=people,dc=bla,dc=com";
    $info["cn"] = $_POST['newNom'];
    $info["sn"] = $_POST['newPrenom'];
    $info["givenName"] = $_POST['newNom'] . " " . $_POST['newPrenom'];
    $info["userPassword"] = $_POST['newPassword'];
    $info["description"] = "test";
    $info["homeDirectory"] = "/home/user";
    $info["uidNumber"] = random_int(0,100000);
    $info["gidNumber"] = random_int(0,100000);
    $info["uid"] = $uid;
    $info["objectclass"][0] = "top";
    $info["objectclass"][1] = "person";
    $info["objectclass"][2] = "organizationalPerson";
    $info["objectclass"][3] = "inetOrgPerson";
    $info["objectclass"][4] = "posixAccount";
    $info["objectclass"][5] = "shadowAccount";
    
     // Ajoute les données au dossier
    $r = ldap_add($ldapconn, $dn, $info);
    
    echo "<br />La modification a été effectué !!!\n";

    ldap_close($ldapconn);
    */
	
?>
