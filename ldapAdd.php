<?php
	include 'connexion.php';
	include 'ldap.html';

	//ajout d un utilisateur
	$uid=$_POST['pseudo'];
	$dn="uid=$uid,ou=people,dc=bla,dc=com";
    $info["cn"] = $_POST['nom'];
    $info["sn"] = $_POST['prenom'];
    $info["givenName"] = $_POST['nom']." ".$_POST['prenom'];
    $info["userPassword"] = $_POST['password'];
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
    
    /*
    $grou=$_POST['groupe'];

    $dnn=$_POST="cn=$grou,ou=group,dc=example,dc=com";
    ldap_mod_add($ldapconn, $dnn, $uid);
    */
    
    echo "L'utilisateur a été ajouté!!!\n";
    ldap_close($ldapconn);
?>


