<?php
require_once ('modele.php');
class Client
{
	private $_nom;
	private $_prenom;
	private $_adresse;
	private $_anniversaire;	
	private $_numero;
	private $_email;
	//private $_password;
	private $operation;
	
	public function __construct($num,$mail){		
		$this->_numero = $num;
		$this->_email = $mail;
		$this->_nom = "";
		$this->_prenom = "";
		$this->_adresse = "";
		$this->_anniversaire = NULL;
		$this->operation = new Modele;
		
	
		//$this->_password = $pwd;
	}
//--------------SETTERS-------------------------------------------
	private function setNom($nom){
		$this->_nom = $nom;
	}
	
	private function setPrenom($prenom){
		$this->_prenom = $prenom;
	}
	
	private function setAdresse($adresse){
		$this->_adresse = $adresse;
	}
	
	private function setAnniversaire($anniv){
		$this->_anniversaire = $anniv;
	}
//--------------SETTERS-------------------------------------------	

// FUNCTION
	public function updateClient(){		
		//$operation = new Modele();
		$this->operation->updateClt($this->_nom,$this->_prenom,$this->_adresse,$this->_anniversaire,$this->_numero);
	}
	
		
	public function inscription(){
		$resultatNumero = $this->operation->searchNumeroClt($this->_numero);
		$resultatEmail = $this->operation->searchEmailClt($this->_email);
		$result = false;
		if(!$resultatNumero && !$resultatEmail){
			$this->operation->saveClt($this->_numero,$this->_email);
			$result = true;
		}else{
			// a ameliorer.
			echo " Erreur numero et email existant cliquez <a href='index.html'>ici</a>";
			//header("location:index.html");
		}
		
		return $result;
	}
	
//FIN FUNCTION 	
//------------GETTERS---------------------------------------------
	public function getNumero()
	{
		return $this->_numero;
	}
	
	public function getEmail()
	{
		return $this->_email;
	}
	
	/*public function getPassword()
	{
		return $this->_password;
	}*/
	
	public function getNom(){
		return $this->_nom;
	}
	
	public function getPrenom(){
		return $this->_prenom;
	}
	
	public function getAnniversaire(){
		return $this->_anniversaire;
	}
	
	public function getAdresse(){
		return $this->_adresse;
	}
//------------GETTERS---------------------------------------------		
}