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
		$req = "SELECT * FROM fiche WHERE matricule ='".$matricule."' ;";
		$res = PdoLBC::$monPdo->query($req);
		$lesLignes = $res->fetchall();
		return $lesLignes;
		
	}

	
	public function getToutesLesNotes()
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

		$res = PdoTransNat::$monPdo->prepare('INSERT INTO forfait (idforfait, 
			libelleforfait, montant) VALUES( :id,:libelle, :montant)');
		$res->bindValue('idforfait',$id, PDO::PARAM_STR);
		$res->bindValue('libelleforfait', $libelle, PDO::PARAM_STR);   
		$res->bindValue('montant', $montant, PDO::PARAM_STR);
		$res->execute();
	}

	public function getMatricule($login)
	{
		$req = "SELECT matricule FROM visiteur WHERE matricule = $login";
		$res = PdoLBC::$monPdo->query($req);
		$lesLignes = $res->fetch();
		return $lesLignes;
	}
	public function getLaNoteByID($idValeur)
	{
		$req = "SELECT * FROM fiche WHERE matricule ='$valeur', mois=' $mois'";
		$res = PdoLBC::$monPdo->query($req);
		$lesLignes = $res->fetch();
		return $lesLignes;
	}

	public function getLeMatricule($matricule)
	{
		$res = PdoLBC::$monPdo->prepare('SELECT * FROM visiteur WHERE matricule = :matricule');
		$res->bindValue('matricule',$matricule, PDO::PARAM_STR);
		$res->execute();
		$Ligne = $res->fetch();
		return $Ligne;
	}

	public function creerFrais($matricule,$annee,$mois,$statut,$datefiche,$lienpdf)
	{
		$res = PdoLBC::$monPdo->prepare('INSERT INTO fiche (matricule, 
		annee, mois, statut, datefiche, lienpdf) VALUES( :matriculeM, 
		:anneeM, :moisN, :statutN, :dateficheN, :lienpdfM)');
		$res->bindValue('matricule',$matricule, PDO::PARAM_STR);
		$res->bindValue('annee', $annee, PDO::PARAM_STR); 
		$res->bindValue('mois', $mois, PDO::PARAM_STR);
		$res->bindValue('statut', $statut, PDO::PARAM_STR);
		$res->bindValue('datefiche', $datefiche, PDO::PARAM_STR);
		$res->bindValue('lienpdf', $lienpdf, PDO::PARAM_STR);
		$res->execute();
	}

}
