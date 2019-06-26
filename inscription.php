<?php 
require_once('client.php');
require_once ('profil.php');
//include ('modele.php');

if(isset($_POST['valider'])){
	$email = htmlspecialchars($_POST['email']);
	$numero = htmlspecialchars($_POST['numero']);
	$mdp = htmlspecialchars($_POST['mdp']);
	$Cmdp = htmlspecialchars($_POST['Cmdp']);
	
	if($mdp != $Cmdp){
		
		echo "les deux mot de passe ne sont pas identiques cliquez <a href='index.html'>ici</a>";
	}else{
		$mdp_hache = password_hash($mdp, PASSWORD_DEFAULT);
		$client = new Client($numero, $email);
		
		if($client->inscription()){
			$profil = new Profil($numero, $mdp_hache);
			$profil->creerProfil();
			session_start();
			$_SESSION['numero'] = $numero;
			$_SESSION['email'] = $email;
			header("location:home.php");
			
		}	
	
		
		
	}
	

}



