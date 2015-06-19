<?php 
require_once("login_functions.php");

/* 

* Sätter bara session variabler och returnerar TRUE eller FALSE (javascript får göra relaod)
* Returnerar
* TRUE in/utloggning lyckad
* FALSE in/utloggning misslyckad
* NULL tillräcklig/felaktig information för in/utloggning
*/

if(isset($_GET[Config::PARAM_AJAX])){
	switch($_GET[Config::PARAM_AJAX]){
		case "login":
			if(isset($_POST["u"])&&isset($_POST["p"])){
				if(login_user($_POST["u"], $_POST["p"])){
					print "TRUE";
				} else {
					print "FALSE";	
				}
			} else {
				print "ERROR Felaktiga login-parametrar";	
			}
			break;
		case "logout":
			if(logout_user()){
				print "TRUE";
			} else {
				print "FALSE";	
			}
			break;
		case "getLogoutHTML":
			getLogoutHTML();
			break;
		case "getLoginHTML":
			getLoginHTML();
			break;
		default:
			print "ERROR Felaktiga login-funktion";
			
	}
} else {
	print "ERROR Saknad login-funktion";
}
			
?>