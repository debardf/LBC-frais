<?php

class PdoLBC
{   		
      	private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=lbc';  		
      	private static $user='root';
		  private static $mdp='';
		private static $monPdo;
		private static $monPdoLBC = null;
			
	private function __construct()
	{
    		PdoLBC::$monPdo = new PDO(PdoLBC::$serveur.';'.PdoLBC::$bdd, PdoLBC::$user, PdoLBC::$mdp); 
			PdoLBC::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct(){
		PdoLBC::$monPdo = null;
	}

	public  static function getPdoLBC()
	{
		if(PdoLBC::$monPdoLBC == null)
		{
			PdoLBC::$monPdoLBC= new PdoLBC();
		}
		return PdoLBC::$monPdoLBC;  
	}

	

	public function getInformationsConnexion($login,$mdp)
	{
		$req = "SELECT * FROM profil WHERE login='$login' and mdp ='$mdp' ";
		$res = PdoLBC::$monPdo->query($req);
		$lesLignes = $res->fetch();
		return $lesLignes;
	}



	public function getLesNotes($matricule)
	{
		$req = "SELECT * FROM fiche WHERE matricule ='$matricule' ";
		$res = PdoLBC::$monPdo->query($req);
		$lesLignes = $res->fetch();
		return $lesLignes;

	}

	
	public function getToutesLesNotes($matricule)
	{
		$req = "SELECT * FROM fiche ";
		$res = PdoLBC::$monPdo->query($req);
		$lesLignes = $res->fetch();
		return $lesLignes;

	}

	public function getLaNote($matricule, $mois, $annee)
	{
		$req = "SELECT * FROM fiche WHERE matricule ='$idValeur', annee = '$annee', mois = '$mois' ";
		$res = PdoLBC::$monPdo->query($req);
		$lesLignes = $res->fetch();
		return $lesLignes;
	}

	public function getLesForfaits()
	{
		$req = "SELECT * FROM forfait";
		$res = PdoLBC::$monPdo->query($req);
		$lesLignes = $res->fetch();
		return $lesLignes;
}		
	public function creerForfait($idforfait,$libelleforfait,$montant)
	{
		$res = PdoTransNat::$monPdo->prepare('INSERT INTO forfait (idF, 
			libelleF, montantF) VALUES( :id,:libelle, :montant)');
		$res->bindValue('id',$idforfait, PDO::PARAM_STR);
		$res->bindValue('libelle', $libelleforfait, PDO::PARAM_STR);   
		$res->bindValue('montant', $montant, PDO::PARAM_STR);
		$res->execute();
	}

	public function getMatricule($login)
	{
		$req = "SELECT valeur FROM profil WHERE login = $login";
		$res = PdoLBC::$monPdo->query($req);
		$lesLignes = $res->fetch();
		return $lesLignes;
	}
	public function getLaNoteByID($idValeur)
	{
		$req = "SELECT * FROM fiche WHERE matricule ='$idValeur'";
		$res = PdoLBC::$monPdo->query($req);
		$lesLignes = $res->fetch();
		return $lesLignes;
	}

}
