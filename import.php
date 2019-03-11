<?php
	include 'connexion.php';
	
	
	if(isset($_POST['import_json'])){
		$json = file_get_contents($_FILES['userfile']['tmp_name']);
		$content = json_decode($json, true);
		// size -2
		for ($i = 0; $i < sizeof($content) - 1; $i++) {
			if (array_key_exists('uid', $content[$i])) {
				$dn = $content[$i]["dn"];
				$infopeolpleimport["cn"] = $content[$i]["cn"][0];
				$infopeolpleimport["uid"] = $content[$i]["uid"][0];
				$infopeolpleimport["sn"] = $content[$i]["sn"][0];
				for ($x = 0; $x < sizeof($content[$i]["objectclass"]) - 1; $x++) {
					$infopeolpleimport["objectclass"][$x] = $content[$i]["objectclass"][$x];
				}
				$infopeolpleimport["givenName"] = $content[$i]["givenname"][0];
				$infopeolpleimport["userPassword"] = $content[$i]["userpassword"][0];
				$infopeolpleimport["homeDirectory"] = $content[$i]["homedirectory"][0];
				$infopeolpleimport["uidNumber"] = $content[$i]["uidnumber"][0];
				$infopeolpleimport["gidNumber"] = $content[$i]["gidnumber"][0];
				$infopeolpleimport["loginShell"] = $content[$i]["loginshell"][0];
				ldap_add($ldapconn, $dn, $infopeolpleimport);
			}
			else {
				$dn = $content[$i]["dn"];
				$infogroupimport["gidNumber"] = $content[$i]["gidnumber"][0];
				if (array_key_exists('memberuid', $content[$i])) {
					for ($j = 0; $j < sizeof($content[$i]["memberuid"]) - 1; $j++) {
						$infogroupimport['memberuid'][$j] = $content[$i]["memberuid"][$j];
					}
				}
				for ($x = 0; $x < sizeof($content[$i]["objectclass"]) - 1; $x++) {
					$infogroupimport["objectclass"][$x] = $content[$i]["objectclass"][$x];
				}
				$infogroupimport["cn"] = $content[$i]["cn"][0];
				$infogroupimport["description"] = $content[$i]["description"][0];
				ldap_add($ldapconn, $dn, $infogroupimport);
			}
		}
	}
	ldap_close($ldapconn);
	include 'ldap.html';
?>

