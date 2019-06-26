<?php
require_once ('modele.php');
class Profil
{
	private $_profilId;
	private $_profilPwd;	
	private $_profilEmail;	
	private $operation;
	
	public function __construct($id,$pwd){
		$this->_profilId = $id;
		$this->_profilPwd = $pwd;
		
		
		$this->operation = new Modele;
		$resultat = $this->operation->searchNumeroClt($id);
		$this->_profilEmail = $resultat['email'];
	}
	public function updatePwd($mdp){
		$this->_profilePwd = $mdp;
	}
	
	public function creerProfil(){
		$this->operation->saveProfile($this->_profilId,$this->_profilPwd);
	}
	
	// affciher la view
	public function chargerProfil(){
		$profil = $this->operation->connexionViaNumero($this->_profilId);
		$pwd_verif = password_verify($this->_profilPwd, $profil['password']);
		if (!$profil)
		{

			echo 'Mauvais identifiant ou mot de passe ! cliquez <a href="index.html">ici</a>';

		}else{

			if ($pwd_verif) {

				session_start();
				$_SESSION['numero'] = $this->_profilId;
				$_SESSION['email'] = $this->_profilEmail;

				//echo 'Vous êtes connecté !';
				header("location:home.php");
			}else {

				echo 'Mauvais identifiant ou mot de passe! cliquez <a href="index.html">ici</a>';

			}

		}
	}
	
	public function transfert_en_cours(){
		$transfert_en_cours = $this->operation->afficherTransfert($this->_profilId);
	}
	
	public function historique(){
		$historique = $this->operation->afficherTransfertEnCours($this->_profilId);
	}
	
}