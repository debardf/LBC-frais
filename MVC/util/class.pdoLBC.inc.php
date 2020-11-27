<?php

class PdoLBC
{   		
      	private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=lbc';  		
      	private static $user='root';
		  private static $mdp='root';
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



	public function getLesNotes($valeur)
	{
		$req = "SELECT * FROM fiche WHERE matricule ='$valeur' ";
		$res = PdoLBC::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;

	}

	
	public function getToutesLesNotes()
	{
		$req = "SELECT * FROM fiche ";
		$res = PdoLBC::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;

	}

	public function getLaNote($matricule, $mois, $annee)
	{
		$req = "SELECT * FROM fiche WHERE matricule ='$matricule' and annee = '$annee' and mois = '$mois' ";
		$res = PdoLBC::$monPdo->query($req);
		$lesLignes = $res->fetch();
		return $lesLignes;
	}

	public function getLesForfaits($matricule)
	{
		$req = ('SELECT * from forfais WHERE matricule = :matricule');
		$res->bindValue('matricule',$matricule, PDO::PARAM_STR);
		$res->execute();
		$lesLignes = $res->fetch();
		return $lesLignes;
}		
	public function creerForfait($idforfait,$matricule,$annee, $mois, $quantite)
	{

		$res = PdoTransNat::$monPdo->prepare('INSERT INTO ajouteforfait (idforfait, 
			matricule, annee, mois, quantite, valideForfait) VALUES( :id,:matricule, :annee, :mois, :quantite, nuLL)');
		$res->bindValue('idforfait',$id, PDO::PARAM_STR);
		$res->bindValue('matricule',$matricule, PDO::PARAM_INT);
		$res->bindValue('annee',$annee, PDO::PARAM_STR);
		$res->bindValue('mois',$mois, PDO::PARAM_INT);
		$res->bindValue('quantite',$quantite, PDO::PARAM_INT);
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

	public function creerFrais($matricule,$annee,$mois,$statut,$datefiche,$lienpdf)
	{
		$res = PdoLBC::$monPdo->prepare('INSERT INTO fiche (matricule, 
		annee, mois, statut, datefiche, lienpdf) VALUES( :matriculeN, 
		:anneeN, :moisN, :statutN, :dateficheN, :lienpdfN)');
		$res->bindValue('matriculeN',$matricule, PDO::PARAM_INT);
		$res->bindValue('anneeN', $annee, PDO::PARAM_STR);
		$res->bindValue('moisN', $mois, PDO::PARAM_INT);
		$res->bindValue('statutN', $statut, PDO::PARAM_STR);
		$res->bindValue('dateficheN', $datefiche, PDO::PARAM_STR);
		$res->bindValue('lienpdfN', $lienpdf, PDO::PARAM_STR);
		$res->execute();
	}


	public function getLesFrais($matricule)
	{
		$req = ('select * from frais WHERE matricule = :matricule');
		$res->bindValue('matricule',$matricule, PDO::PARAM_STR);
		$res->execute();
		$Ligne = $res->fetch();
		return $Ligne;
	}


	public function getAnnee()
	{
		$req = 'select distinct annee from fiche';
		$res = PdoLBC::$monPdo->query($req);
		return $res;
	}

	public function getMois()
	{
		$req = 'select distinct mois from fiche';
		$res = PdoLBC::$monPdo->query($req);
		return $res;
	}

	public function creerAutreForfait($matricule, $annee, $mois, $datefrais, $libelle, $montant, $validefrais)
	{
		$res = PdoLBC::$monPdo->prepare('INSERT INTO frais (matricule, 
		annee, mois, datefrais, libelle, montant, validefrais) VALUES( :Amatricule, 
		:Aannee, :Amois, :Adate, :Alibelle, :Amontant, :Avalidefrais)');
		$res->bindValue('Amatricule',$matricule, PDO::PARAM_INT);
		$res->bindValue('Aannee', $annee, PDO::PARAM_STR);
		$res->bindValue('Amois', $mois, PDO::PARAM_INT);
		$res->bindValue('Adate', $statut, PDO::PARAM_STR);
		$res->bindValue('Alibelle', $datefiche, PDO::PARAM_STR);
		$res->bindValue('Amontant', $lienpdf, PDO::PARAM_STR);
		$res->bindValue('Avalidefrais', $validefrais, PDO::PARAM_STR);
		$res->execute();

	public function getLesFraisForfaitaires($matricule, $annee, $mois)
	{
	$req = ( "SELECT libelleforfait, quantite, montant FROM ajouteforfait INNER JOIN forfait ON ajouteForfait.idforfait = forfait.idforfait WHERE matricule = '$matricule' AND annee = '$annee' AND mois = '$mois' " );
	$res = PdoLBC::$monPdo->query($req);
	$lesLignes = $res->fetchAll();	
	return $lesLignes;

	}

}
