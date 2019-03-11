<?php
	include 'ldap.html';
	$log=$_POST['login'];
	$password=$_POST['passwordCo'];
	
	if($log == "admin" && $password=="bla"){
		header('Location: ldap.html');
	}else{
		header('Location: ldapUser.html');
	}
?>
