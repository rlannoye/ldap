<?php
		// Eléments d'authentification LDAP
		$ldaprdn  = 'cn=admin,dc=bla,dc=com';     // DN ou RDN LDAP
		$ldappass = 'bla';  // Mot de passe associé
		 
		// Connexion au serveur LDAP
		$ldapconn = ldap_connect("localhost")
		or die("Impossible de se connecter au serveur LDAP.");
	 
		ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
		 

		if ($ldapconn) {
			// Connexion au serveur LDAP
			$ldapbind = ldap_bind($ldapconn, $ldaprdn, $ldappass);

			// Vérification de l'authentification
			if ($ldapbind) {
				echo "";
			} else {
				echo "";
			}
		}
	
	
	/*
	$log=$_POST['login'];
	
	if($log == "admin"){
		// Eléments d'authentification LDAP
		$ldaprdn  = 'cn=admin,dc=bla,dc=com';     // DN ou RDN LDAP
		$ldappass = 'bla';  // Mot de passe associé
		 
		
		// Connexion au serveur LDAP
		$ldapconn = ldap_connect("localhost")
		or die("Impossible de se connecter au serveur LDAP.");
	 
		ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
		 

		if ($ldapconn) {
			// Connexion au serveur LDAP
			$ldapbind = ldap_bind($ldapconn, $ldaprdn, $ldappass);
			header('Location: ldap.html');
		}
	}else{
		$ldaprdn  = 'uid=toto,ou=people,dc=bla,dc=com';
		// Connexion au serveur LDAP
		$ldapconn = ldap_connect("localhost")
		or die("Impossible de se connecter au serveur LDAP.");
	 
		ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
		 

		if ($ldapconn) {
			// Connexion au serveur LDAP
			$ldapbind = ldap_bind($ldapconn, $ldaprdn, $ldappass);
			header('Location: ldapUser.html');
		}
	}
	*/
?>





	
	
