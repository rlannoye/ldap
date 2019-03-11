<?php
	include 'connexion.php';
	include 'ldap.html';

	//ajout d un utilisateur
	$group = $_POST['group'];
	$dn="cn=".$group.",ou=group,dc=bla,dc=com";
	$info["cn"] = $group;
	$info["objectClass"][0] = "top";
    $info["objectClass"][1] = "organizationalRole";
    $info["ou"] = "group";
    $info["description"] = $_POST['description'];
    
     // Ajoute les données au dossier
    $r = ldap_add($ldapconn, $dn, $info);
    
    echo "Nouveau groupe ajouté!!!\n";
    ldap_close($ldapconn);
    
?>
