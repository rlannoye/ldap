<html>
	<head>
		<title> Groupes </title>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<link rel="stylesheet" type="text/css" href="ldap.css">
	</head>

	<body>
		<h1> Liste des groupes </h1>
		<?php
			include 'connexion.php';

			$r=ldap_bind($ldapconn);     
		 
			$sr=ldap_search($ldapconn, "ou=group,dc=bla,dc=com","cn=*");

			echo ' <br /> <br /> Nombre de groupes : ' . ldap_count_entries($ldapconn,$sr)
				 . '<br />';
		 
			$info = ldap_get_entries($ldapconn, $sr);
			echo '<br />Données pour ' . $info["count"] . ' entrées:<br /> <br />';
		 
			for ($i=0; $i<$info["count"]; $i++) {
				echo 'cn :' .$info[$i]["cn"][0] . '<br />';
				echo 'ou :' .$info[$i]["ou"][0] . '<br />';
				echo 'description :' .$info[$i]["description"][0] . '<br />';
				echo '<br />';
			}
			ldap_close($ldapconn);
		?>
	</body>
</html>
