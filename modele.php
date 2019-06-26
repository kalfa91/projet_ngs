<?php
require_once ('connexion.php');
class Modele{
	private $DataBase;
	private $db;
	
	public function __construct(){
		$this->DataBase = new Connect; 
		$this->db = $this->DataBase->connexion(); 
	}
	public function saveClt($numero,$email){
		$_newInsert = $this->db->prepare('INSERT INTO client(numero,email,nom,prenom,adresse,anniv,dateInscription) VALUES (:numero,:email,:nom,:prenom,:adresse,NULL,CURDATE())');
		$_newInsert->execute(array(
		'numero'=> $numero,
		'email'=> $email,			
		'nom'=> "",			
		'prenom'=> "",			
		'adresse'=> ""			
		));
		
	}
	
	public function searchNumeroClt($n){
		$_requete = $this->db->prepare('SELECT * FROM client WHERE numero = ?');
		$_requete->execute(array($n));
		$_resultat = $_requete->fetch();
		return $_resultat;
	}
	
	
	public function searchEmailClt($e){
		$_requete = $this->db->prepare('SELECT * FROM client WHERE email = ?');
		$_requete->execute(array($e));
		$_resultat = $_requete->fetch();
		return $_resultat;
	}
	
	public function updateClt($nom,$prenom,$adresse,$anniversaire,$numero){
		$_updateClient = $this->db->prepare('UPDATE client SET nom = :nom, prenom = :prenom, adresse = :adresse, anniversaire = :anniversaire WHERE numero = :numero');
		$_updateClient->execute(array(
		'nom'=> $nom,
		'prenom'=> $prenom,			
		'adresse'=> $adresse,			
		'anniversaire'=> $anniversaire,			
		'numero'=> $numero		
		));
	}
	
	
	
	public function saveProfile($numero,$mdp){
		$_newInsert = $this->db->prepare('INSERT INTO profil(numeroClt,password) VALUES (:numero,:password)');
		$_newInsert->execute(array(
		'numero'=> $numero,			
		'password'=> $mdp			
		));
	}
	
	public function connexionViaNumero($n){
		$_requete = $this->db->prepare('SELECT numeroClt,password FROM profil WHERE numeroClt = ?');
		$_requete->execute(array($n));
		$_resultat = $_requete->fetch();
		return $_resultat;
	}
	
	public function getProfil($n){
		$_requete = $this->db->prepare('SELECT * FROM profil WHERE numeroClt = ?');
		$_requete->execute(array($n));
		$_resultat = $_requete->fetch();
		return $_resultat;
	}

	
	
	public function connexionViaEmail($e){
		$_requete = $this->db->prepare('SELECT emailClt,password FROM profil WHERE emailClt = ?');
		$_requete->execute(array($e));
		$_resultat = $_requete->fetch();
		return $_resultat;
	}
	
	public function saveTransfert($id,$exp,$dest,$frais,$question,$reponse,$montant,$total,$statut){
		$_newInsert = $this->db->prepare('INSERT INTO transfert(idPayment,expediteur,destinataire,dateTransfert,frais,question,reponse,montant,total,statut) VALUES (:id,:expediteur,:destinataire,NOW(),:frais,:question,:reponse,:montant,:total,:statut)');
		$_newInsert->execute(array(
		'id'=> $id,
		'expediteur'=> $exp,
		'destinataire'=> $dest,		
		'frais'=> $frais,		
		'question'=> $question,		
		'reponse'=> $reponse,		
		'montant'=> $montant,		
		'total'=> $total,		
		'statut'=> $statut
		));
	}
	
	/*public function saveTransfertEnCours($id,$exp,$dest,$montant,$question,$reponse,$statut){
		$_newInsert = $this->db->prepare('INSERT INTO transfert_en_cours(idPayment,expediteur,dateTransfert,destinataire,montant,question,reponse,statut) VALUES (:id,:expediteur,NOW(),:destinataire,:montant,:question,:reponse,:statut)');
		$_newInsert->execute(array(
		'id'=> $id,
		'expediteur'=> $exp,
		'destinataire'=> $dest,	
		'montant'=> $montant,			
		'question'=> $question,		
		'reponse'=> $reponse,					
		'statut'=> $statut
		));
	}
	*/
	public function afficherTransfert($e,$statut){
		$_requete = $this->db->prepare('SELECT * FROM transfert WHERE expediteur = ? AND statut = ?');
		$_requete->execute(array($e,$statut));
	//	$_resultat = $_requete->fetch();
		//$_resultat = $_requete->fetch();
		return $_requete;//$_resultat;
	}
	
	/*public function afficherTransfertEnCours($e){
		$_requete = $this->db->prepare('SELECT * FROM transfert_en_cours WHERE expediteur = ?');
		$_requete->execute(array($e));
		$_resultat = $_requete->fetch();
		return $_resultat;
	}
	*/
	/* public function loadProfil($id, $pwd){
		$_requete = $this->db->prepare('SELECT expediteur,dateTransfert,destinataire,montant,question,reponse,statut FROM transfert_en_cours WHERE expediteur = ?');
		$_requete->execute(array($e));
		$_resultat = $_requete->fetch();
		return $_resultat;
	} */
} // fin classe