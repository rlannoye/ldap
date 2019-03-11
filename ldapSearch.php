<html>
	<head>
		<title> Utilisateurs </title>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<link rel="stylesheet" type="text/css" href="ldap.css">
	</head>

	<body>
		<h1> Liste des utilisateurs </h1>
		<?php
			include 'connexion.php';

			$r=ldap_bind($ldapconn);     
		 
			$sr=ldap_search($ldapconn, "dc=bla, dc=com", "uid=*");

			echo ' <br /> <br /> Nombre d\'utilisateurs : ' . ldap_count_entries($ldapconn,$sr)
				 . '<br />';
		 
			$info = ldap_get_entries($ldapconn, $sr);
			echo '<br />Données pour ' . $info["count"] . ' entrées:<br /> <br />';
		 
			for ($i=0; $i<$info["count"]; $i++) {
				echo 'common name : ' .$info[$i]["cn"][0] . '<br />';
				echo 'surname : ' .$info[$i]["sn"][0] . '<br />';
				echo 'pseudo : ' .$info[$i]["uid"][0] . '<br />';
				echo '<br />';
			}
			ldap_close($ldapconn);
		?>
	</body>
</html>


