<?php 
//include ('client.php');
include ('profil.php');
//include ('modele.php');

if(isset($_POST['valider'])){
	$id = htmlspecialchars($_POST['id']);
	$mdp = htmlspecialchars($_POST['mdp']);	
	$profil = new Profil($id, $mdp);
	$profil->chargerProfil();
	
}else{
	 header('location:index.html');
}