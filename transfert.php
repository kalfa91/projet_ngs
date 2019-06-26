<?php
 require_once('modele.php');
class Transfert{
	
	private $_expediteur;
	private $_destinataire;
	private $_frais;
	private $_question;
	private $_reponse;
	private $_montant;
	private $_total;
	private $_statut;
	private $operation;
	
	public function __construct($exp,$dest,$question,$reponse,$montant){
		$this->_expediteur = $exp;
		$this->_destinataire = $dest;
		$this->_frais = $montant * 0.2;
		$this->_question = $question;
		$this->_reponse = $reponse;
		$this->_montant = $montant;
		$this->_total = $montant + $this->_frais;
		$this->operation = new Modele;
		//$this->_statut = "EN COURS";
		// enregistrer dans transfert en cours
		// $operation-> saveTransfertEnCours($exp,$dest,$montant,$question,$reponse,$statut);
	}
	
	public function getDestinataire(){
		return $this->_destinataire;
	}
	
	public function getFrais(){
		return $this->_frais;
	}
	
	public function getQuestion(){
		return $this->_question;
	}
	
	public function getReponse(){
		return $this->_reponse;
	}
	
	public function getMontant(){
		return $this->_montant;
	}
	
	public function getTotal(){
		return $this->_total;
	}
	
	public function getStatut(){
		return $this->_statut;
	}
	
	public function transfertCompleter(){
		$this->_statut = "TERMINE";
		$this->operation->updateTransfert($this->_statut);
		
	}
	
	public function transfertEnCours($id){
		$this->_statut = "EN COURS";
		$this->operation->saveTransfert($id,$this->_expediteur,$this->_destinataire,$this->_frais,$this->_question,$this->_reponse,$this->_montant,$this->_total,$this->_statut);
		
	}
}