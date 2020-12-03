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

	
	//recupération du login et du mdp
	
	public function getInformationsConnexion($login,$mdp)
	{
		$req = "SELECT * FROM profil WHERE login='$login' and mdp ='$mdp' ";
		$res = PdoLBC::$monPdo->query($req);
		$lesLignes = $res->fetch();
		return $lesLignes;
	}
	
	//récupérer les notes du visiteur
	
	public function getLesNotes($valeur)
	{
		$req = "SELECT * FROM fiche WHERE matricule ='$valeur' ";
		$res = PdoLBC::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
		
	}
	
	//récupérer toutes les notes pour le comptable
	
	public function getToutesLesNotes()
	{
		$req = "SELECT * FROM fiche ";
		$res = PdoLBC::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
		
	}
	
	//récupération d'une note selon le matricule, l'année et le mois
	
	public function getLaNote($matricule, $mois, $annee)
	{
		$req = "SELECT * FROM fiche WHERE matricule ='$matricule' and annee = '$annee' and mois = '$mois' ";
		$res = PdoLBC::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
	
	//obtenir la liste des forfaits du visiteur
	
	public function getLesForfaits($matricule, $annee, $mois)
	{
		$req = "SELECT * FROM ajouteforfait inner join forfait on forfait.idforfait=ajouteforfait.idforfait WHERE matricule='$matricule' and annee='$annee' and mois='$mois'";
		$res = PdoLBC::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}

	//obtenir un forfait d'un visiteur

	public function getLeForfait($matricule)
	{
		$req = "SELECT * FROM ajouteforfait inner join forfait on forfait.idforfait=ajouteforfait.idforfait WHERE matricule ='$matricule'";
		$res = PdoLBC::$monPdo->query($req);
		$laLigne = $res->fetchAll();
		return $laLigne;
	}

    //liste des années

	public function getAnnee($matricule)
	{
		$req = "select distinct annee from fiche where matricule = '$matricule'";
		$res = PdoLBC::$monPdo->query($req);
		return $res;
	}

    //liste des mois

	public function getMois($matricule)
	{
		$req = "select distinct mois from fiche where matricule = '$matricule'";
		$res = PdoLBC::$monPdo->query($req);
		return $res;
	}

    //liste des libellés

	public function getLibelle()
	{
		$req = "SELECT * FROM forfait";
		$res = PdoLBC::$monPdo->query($req);
		return $res;
	}
	
	//obtenir la liste des autres frais du visiteur

	public function getLesFrais($matricule, $annee, $mois)
	{
		$req = ("SELECT * from frais WHERE matricule = '$matricule' and annee= '$annee' and mois = '$mois'");
		$res = PdoLBC::$monPdo->query($req);
		$Ligne = $res->fetchAll();
		return $Ligne;
	}

	
	//associer le matricule au login(profil)
	
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
	
	//création d'une note de frais

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

	//création d'un nouveau forfait
	
	public function creerForfait($matricule,$annee, $mois, $idforfait, $quantite, $valideForfait)
	{
		
		$res = PdoTransNat::$monPdo->prepare('INSERT INTO ajouteforfait (matricule, annee, mois, idforfait, quantite, valideForfait)
				VALUES(:matricule, :annee, :mois, :id, :quantite, :valideForfait)');
		$res->bindValue('matricule',$matricule, PDO::PARAM_INT);
		$res->bindValue('annee',$annee, PDO::PARAM_STR);
		$res->bindValue('mois',$mois, PDO::PARAM_INT);
		$res->bindValue('id',$id, PDO::PARAM_STR);
		$res->bindValue('quantite',$quantite, PDO::PARAM_INT);
		$res->bindValue('valideForfait',$valideForfait, PDO::PARAM_INT);
		$res->execute();
	}

	//création d'un autre forfait

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
	}

	//modification frais

	public function modifFrais($id,$matricule,$annee,$mois,$qte)
	{
		$res = PdoLBC::$monPdo->prepare("UPDATE ajouteforfait
		SET idforfait = :idforfait, matricule = :matricule, annee = :annee, mois = :mois, quantite =  :quantite WHERE idforfait = '$id'");
		$res->bindValue('idforfait',$id, PDO::PARAM_INT);
		$res->bindValue('matricule', $matricule, PDO::PARAM_INT);   
		$res->bindValue('annee', $annee, PDO::PARAM_INT);
		$res->bindValue('mois', $mois, PDO::PARAM_INT);
		$res->bindValue('quantite', $qte, PDO::PARAM_INT);
		$res->execute();
	}

	public function getLesFraisForfaitaires($matricule, $annee, $mois)
	{
	$req = ( "SELECT libelleforfait, quantite, montant FROM ajouteforfait INNER JOIN forfait ON ajouteForfait.idforfait = forfait.idforfait WHERE matricule = '$matricule' AND annee = '$annee' AND mois = '$mois' " );
	$res = PdoLBC::$monPdo->query($req);
	$lesLignes = $res->fetchAll();	
	return $lesLignes;

	}

}
