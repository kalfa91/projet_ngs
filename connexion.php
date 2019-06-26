<?php
class Connect
{
    private $bdd = '';
    private $connec_host = '';
    private $connec_dbname = '';
    private $connec_pseudo = '';
    private $connec_mdp = '';

    public function __construct($connec_host = 'localhost', $connec_dbname = 'transfert_argent', $connec_pseudo = 'root', $connec_mdp = ''){
        try {
            $this->bdd = new PDO('mysql:host='.$connec_host.';dbname='.$connec_dbname, $connec_pseudo, $connec_mdp);
            $this->bdd->exec("SET CHARACTER SET utf8");
            $this->bdd->exec("SET NAMES utf8");
        }
        catch(PDOException $e) {
            die('<h3>Erreur !</h3>');
        }
    }

    public function connexion(){		
        return $this->bdd;
    }
}